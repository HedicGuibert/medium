<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    private User $simpleUser;
    private User $authorUser;
    private User $editorUser;

    protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers();
    }

    public function testLoginWithGoodCredentials()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->visit('/login')
                ->type('@email', $this->simpleUser->email)
                // We need to hardcode the password because it will be hashed.
                ->type('@password', 'simpleuser')
                ->press('@submit')
                ->assertRouteIs('home')
                ->assertAuthenticatedAs($this->simpleUser);
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
                ->assertRouteIs('login')
                ->assertSee('These credentials do not match our records.');
        });
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
                ->press('@submit')
                ->assertRouteIs('home')
            ;

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
                ->assertRouteIs('register')
            ;

            // test empty fields does not work.
            $browser
                ->type('@name', '')
                ->type('@email', 'register@re.re')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register')
            ;
            $browser
                ->type('@name', 'register')
                ->type('@email', '')
                ->type('@password', 'register')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register')
            ;
            $browser
                ->type('@name', 'register')
                ->type('@email', 'register@re.re')
                ->type('@password', '')
                ->type('@confirm', 'register')
                ->press('@submit')
                ->assertRouteIs('register')
            ;
            $browser
                ->type('@name', 'register')
                ->type('@email', 'register@re.re')
                ->type('@password', 'register')
                ->type('@confirm', '')
                ->press('@submit')
                ->assertRouteIs('register')
            ;

            $this->assertCount($beforeRegisterUsersCount, User::all());
        });
    }

    private function generateUsers()
    {
        $this->simpleUser = User::factory()->create([
            'name' => 'Simple User',
            'password' => Hash::make('simpleuser'),
            'email' => 'user@fixture.com',
            'role' => User::ROLE_USER,
        ]);

        $this->authorUser = User::factory()->create([
            'name' => 'Author User',
            'password' => Hash::make('authoruser'),
            'email' => 'author@fixture.com',
            'role' => User::ROLE_AUTHOR,
        ]);

        $this->editorUser = User::factory()->create([
            'name' => 'Editor User',
            'password' => Hash::make('editoruser'),
            'email' => 'editor@fixture.com',
            'role' => User::ROLE_EDITOR,
        ]);
    }
}
