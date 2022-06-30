<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Dusk\Browser;

class LoginTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testLoginWithGoodCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->visit('/login')
                ->type('@email', $this->getSimpleUser()->email)
                // We need to hardcode the password because it will be hashed.
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->assertAuthenticatedAs($this->getSimpleUser());
        });
    }

    public function testLoginWithBadCrendentials()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->visit('/login')
                ->type('@email', 'azecoucou@aze.fr')
                // We need to hardcode the password because it will be hashed.
                ->type('@password', 'odzand')
                ->press('@submit')
                ->assertRouteIs('login');
        });

        $this->assertFalse(Auth::check());
    }

    public function testRegisterWorks()
    {
        $this->browse(function (Browser $browser) {
            $beforeRegisterUsersCount = count(User::all());

            $browser
                ->logout()
                ->visit('/register')
                ->type('@name', 'register')
                ->type('@email', 'register@re.re')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit');

            $this->assertCount($beforeRegisterUsersCount + 1, User::all());
        });
    }

    public function testRegisterFails()
    {
        $this->browse(function (Browser $browser) {
            $beforeRegisterUsersCount = count(User::all());

            // test bad email address format does not work.
            $browser
                ->logout()
                ->visit('/register')
                ->type('@name', 'register')
                ->type('@email', 'register')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register');

            // test empty fields does not work.
            $browser
                ->type('@name', '')
                ->type('@email', 'register@re.re')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register');
            $browser
                ->type('@name', 'register')
                ->type('@email', '')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register');
            $browser
                ->type('@name', 'register')
                ->type('@email', 'register@re.re')
                ->type('@password', '')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register');
            $browser
                ->type('@name', 'register')
                ->type('@email', 'register@re.re')
                ->type('@password', 'register')
                ->type('@confirm', '')
                ->press('@submit')
                ->assertRouteIs('register');

            $this->assertCount($beforeRegisterUsersCount, User::all());
        });
    }
}
