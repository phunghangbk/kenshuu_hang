<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * Check URL response is correct
     */
    public function testURLResponseCorrect()
    {
        $response = $this->call('GET', 'register');
        $this->assertEquals(200, $response->status());
    }
    
    /**
     * Submit Form with empty fields
     */
    public function testBlankFields()
    {
        $this->visit('/register')
            ->press(trans('messages.register'))
            ->seePageIs('/register');
    }
    
    public function testIncorrectEmail()
    {
        $this->visit('/register')
            ->type('unknown', 'name')
            ->type('unknownexample.org', 'email')
            ->type('mypass', 'password')
            ->type('mypass', 'password_confirmation')
            ->press(trans('messages.register'))
            ->see('メール は有効なeメールアドレスでなければなりません。');
    }

    public function testPasswordNotMatch()
    {
        $this->visit('/register')
            ->type('hello', 'name')
            ->type('hello@realworld.jp', 'email')
            ->type('mypass', 'password')
            ->type('notmypass', 'password_confirmation')
            ->press(trans('messages.register'))
            ->see('パスワード を一致していません。');
    }

    public function testIncorrectPassword()
    {
    	$this->visit('/register')
    	    ->type('hello', 'name')
    	    ->type('hello@realworld.jp', 'email')
    	    ->type('pass', 'password')
    	    ->type('pass', 'password_confirmation')
    	    ->press(trans('messages.register'))
    	    ->see('パスワード は少なくとも 6 キャラックターでなければなりません。');
    }

    public function testExistEmail()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp']);
        $this->visit('/register')
            ->type('hello', 'name')
            ->type('hang@realworld.jp', 'email')
            ->type('mypasss', 'password')
            ->type('mypasss', 'password_confirmation')
            ->press(trans('messages.register'))
            ->see('メール はすでに使用しています。');
    }

    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('ngoc', 'name')
            ->type('ngoc2@realworld.jp', 'email')
            ->type('mypass', 'password')
            ->type('mypass', 'password_confirmation')
            ->press(trans('messages.register'))
            ->seePageIs('/home');
    }

}
