<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;

class UpdateProfileTest extends AbstractBaseTest
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->generateUsers(1);
    }

    public function testUpdateInformations(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/profile')
                ->type('@name', 'Coco')
                ->type('@email', 'coco@coco.co')
                ->press('@submit-informations');
        });

        $this->assertSame(User::find(1)->name, 'Coco');
        $this->assertSame(User::find(1)->email, 'coco@coco.co');
    }

    public function testUpdatePasswordWorks(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/profile')
                ->type('@password', 'cocosword')
                ->type('@confirm', 'cocosword')
                ->press('@submit-password');
        });

        $this->assertTrue(Hash::check('cocosword', User::find(1)->password));
    }

    public function testUpdatePasswordFails(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/profile')
                ->type('@password', 'badcocosword')
                ->type('@confirm', 'cocosword')
                ->press('@submit-password');
        });

        $this->assertFalse(Hash::check('badcocosword', User::find(1)->password));

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/profile')
                ->type('@password', 'cocosword')
                ->type('@confirm', 'badcocosword')
                ->press('@submit-password');
        });

        $this->assertFalse(Hash::check('badcocosword', User::find(1)->password));
    }

    public function testUpdateSocials(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs(User::find(1))
                ->visit('/profile')
                ->type('@twitter', 'cocotwi.com')
                ->type('@linkedIn', 'cocoIn.com')
                ->type('@facebook', 'cocobook.com')
                ->scrollIntoView('@submit-socials')
                ->press('@submit-socials');
        });

        $this->assertSame(User::find(1)->twitterUrl, 'cocotwi.com');
        $this->assertSame(User::find(1)->facebookUrl, 'cocobook.com');
        $this->assertSame(User::find(1)->linkedInUrl, 'cocoIn.com');
    }
}
