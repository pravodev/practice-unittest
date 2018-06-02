<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends DuskTestCase
{
    /**
     * @group auth
     */
    public function testLogin(){
        $this->browse(function(Browser $browser){
            // trying login
            $browser->visit('/login')
                    ->type('email', 'azam@pravodev.xdev')
                    ->type('password','qwerty')
                    ->press('Login')
                    ->assertPathIs('/home');

            // user logout
            $browser->visit('/logout')
                    ->logout();

            // expected when user visit home must redirect to login page
            $browser->visit('/home')
                    ->assertPathIs('/login');
        });
    }
    public function testRegister(){
        $this->browse(function(Browser $browser){
            $browser->visit('/register')
                    ->type('name','asdkjasldasd')
                    ->type('email', 'testingemail@gmail.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }
}
