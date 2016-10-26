<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddArticleTest extends TestCase
{
    public function AddTweetSuccess()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp', 'password' => bcrypt('secret')]);
        $article = factory(App\Article::class)->make(['content' => 'test content', 'user_id' => $user->id]);
        $view = View::make('article', array('article' => $article))->render();
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'));
        $this->call('POST', '/addArticle', ['_token' => csrf_token(), 'content' => $article->content], [], [], 
            ['HTTP_X-Requested-With' => 'XMLHttpRequest',]);
        $data = $this->decodeResponseJson();
        $this->assertEquals($data, $view);
        $this->visit('home')->see($article->content); 
    }

    public function testBlankField()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp', 'password' => bcrypt('secret')]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'));
        $this->call('POST', '/addArticle', ['_token' => csrf_token(), 'content' => ''], [], [], 
            ['HTTP_X-Requested-With' => 'XMLHttpRequest',]);
        $data = $this->decodeResponseJson();
        $this->assertEquals($data['errors']['content'][0], 'コンテンツ フィールドは必須です。');
    }

    public function testContentLength()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp', 'password' => bcrypt('secret')]);
        $article = factory(App\Article::class)->make(['content' => str_random(150), 'user_id' => $user->id]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'));
        $this->call('POST', '/addArticle', ['_token' => csrf_token(), 'content' => $article->content], [], [], 
            ['HTTP_X-Requested-With' => 'XMLHttpRequest',]);
        $data = $this->decodeResponseJson();
        $this->assertEquals($data['errors']['content'][0], 'コンテンツ は 140 キャラックター以下でなければなりません。');
    }
}
