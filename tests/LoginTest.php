<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * Check URL response is correct
     */ 
    public function testURLResponseCorrect()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Submit Form with empty fields
     */
    public function testBlankFields()
    {
        $this->visit('/login')
            ->press(trans('messages.login'))
            ->seePageIs('/login');
    }

    /**
     * Submitting form with incorrect email
     */
    public function testWrongEmail()
    {
        $user = factory(App\User::class)->create();
        $unknownEmail = ($user->email).'a';
        $this->visit('/login')
            ->type($unknownEmail, 'email')
            ->type('invalid-password', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/login');
    }

    /**
     * Submitting form with incorrect password
     */
    public function testWrongPassword()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('secret')]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('invalid-password', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/login');
    }

    /**
     * Submit form with correct email and password
     */
    public function testCorrectData()
    {
        $user = factory(App\User::class)->create();
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/home');
    }
}
