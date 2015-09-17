<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
class BlogPagesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['except' => 'create']);
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(){
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Auth()->user();
        /*      $article = $articles->first();
                $article->title = 'Updated title';
                $article->save();*/
        return view('blog.blogPage');
    }


}
