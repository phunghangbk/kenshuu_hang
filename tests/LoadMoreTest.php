<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoadMoreTest extends TestCase
{
    public function testSuccessLoadMore()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp', 'password' => bcrypt('secret')]);
        factory(App\Article::class, 20)->create(['user_id' => $user->id]); 
        $articles1=$user->articles()->orderBy('created_at', 'DESC')->take(10)->skip(10)->get();
        $view1 = View::make('articles', array('articles' => $articles1))->render(); //make a view with create data
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/home');
        $data = $this->call('GET', '/home/?page=2', [], [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $data1 = $data->original;
        $view2 = View::make('articles', array('articles' => $data1['articles']))->render(); //make a view with return data
        $this->assertEquals($view1, $view2); 
    }

    /**
    * If articles have <10 element number then button load more will be hidden
    **/
    public function testShowButtonLoadMore()
    {
        $user = factory(App\User::class)->create(['email' => 'hang@realworld.jp', 'password' => bcrypt('secret')]);
        $articles = factory(App\Article::class)->create(['user_id' => $user->id]);
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/home')
            ->dontSee(trans('messages.load_more'));
    }

    public function testShowArticle()
    {
        $user = factory(App\User::class)->create(['password' => bcrypt('secret')]);
        $article = factory(App\Article::class)->create(['user_id' => $user->id]); 
        $this->visit('/home')
            ->see('Laravel');
        $this->visit('/login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press(trans('messages.login'))
            ->seePageIs('/home')
            ->see($article->content);
    }
}
