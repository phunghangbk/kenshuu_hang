<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Request;
use App\Article;
use Response;
use Validator;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showArticle(Request $request)
    {
        $articles = Auth::user()->articles()->orderBy('created_at', 'DESC')->paginate(config('constant.page_number'));
        if (Request::ajax()) {
            $flag = count($articles);
            $view = View::make('articles', array('articles' => $articles))->render();
            return Response::json(array('view' => $view, 'flag' => $flag));
        }
        return view('home', ['articles' => $articles]);
    }

    public function addArticle(Request $request)
    {
        if (Request::ajax()) {
            $rules = array(
                'content' => 'required|max:140',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
            }   
            $article = new Article;
            $article->content = Input::get('content');
            $article->user_id = Auth::user()->id;
            $article->save();
            $view = View::make('article', array('article' => $article))->render();
            return Response::json($view);
        }
        return redirect()->to($this->getRedirectUrl())
                        ->withInput($request->input())
                        ->withErrors($errors, $this->errorBag());
    }
}
