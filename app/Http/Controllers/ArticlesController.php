<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use Storage;
use Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\Response;

//use Request;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    /**
     *
     */
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
        $articles = Article::latest('published_at')->published()->get();
        /*      $article = $articles->first();
                $article->title = 'Updated title';
                $article->save();*/
        return view('articles.index', compact('articles'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function myArticles(){
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
        $articles = Auth()->user()->articles()->latest('published_at')->published()->get();
        /*      $article = $articles->first();
                $article->title = 'Updated title';
                $article->save();*/
        return view('articles.index', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show(Article $article){
        //$article = Article::findOrFail($id);
        //dd($article);

/*        if (is_null($article)){
            abort(404);
        }else {

        }*/
        $comments = $article->comments()->get();

        if (pathinfo($article->fileField, PATHINFO_EXTENSION) == 'jpg'){
            $img = Image::make(Storage::get('Uploads/Articles/'.Auth::user()->username.'/'.$article->fileField))->resize(500,300);
            $img->encode('png');
            $type = 'png';
            $upload = 'data:image/' . $type . ';base64,' . base64_encode($img);
            $upload_type = 'img';
        } else if (Storage::exists('Uploads/Articles/'.Auth::user()->username.'/'.$article->fileField)){
            $upload = Storage::get('Uploads/Articles/'.Auth::user()->username.'/'.$article->fileField);
            $upload_type = 'text';
        } else {
            $upload = 'No Content Uploaded';
            $upload_type = 'text';
        }

        // set content-type
        //$img->header('Content-Type', 'image/jpg');
        //dd($base64);
        return view('articles.show', compact('article', 'comments', 'upload_type', 'upload'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create(){
        $tags = \App\Tag::lists('name', 'id');
        return view ('articles.create', compact('tags'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
/*    public function store(Requests\CreateArticleRequest $request){
        //$input['published_at'] = Carbon::now();
        //Article::create(Request::all());
        Article::create($request->all());
        return redirect('articles');
    }*/

    /**
     * @param Requests\CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * another way to validate request form
     */
    public function store(ArticleRequest $request){

        //$input['published_at'] = Carbon::now();
        $article = Auth::user()->articles()->create($request->all());
        //$article = Auth::user()->articles()->firstOrNew($request->all());
        $article->fileField = $request->file('fileField')->getClientOriginalName();
        $article->author = Auth::user()->username;
        $article->save();

        //persist uploaded file
        Storage::put('Uploads/Articles/'.Auth::user()->username.'/'.$request->file('fileField')->getClientOriginalName(),
            file_get_contents($request->file('fileField')->getRealPath()));


        $tagIDs = $request->input('tagList');
        if (! is_null($tagIDs) ){
            $article->tags()->sync($tagIDs);
        }
        //session()->flash('flash_message', 'Your article has been created!');
        //session()->flash('flash_message_important', true);
        flash()->overlay('Your article has been successfully created', 'Good Job');
        //Article::create($request->all());
        //$this->validate($request, ['title' => 'required', 'body' => 'required']);
        return redirect('myArticles');
    }


    public function edit(Article $article){
        //$article = Auth()->user()->articles()->find($id);
        if (! is_null($article)){
            $tags = Tag::lists('name', 'id');
            return view('articles.edit', compact('article', 'tags'));
        }

        return redirect('myArticles')->withErrors(['Error:' => 'You Are Not Authorized to Modify This Article']);
    }

    // laravel knows that id is a wildcard. request is a predefined object
    // laravel will instantiate that object
    public function update(Article $article, ArticleRequest $request){
        //$article = Article::findOrFail($id);
        $article->update($request->all());
        //$article->tags()->detach();
        $tagIDs = $request->input('tagList');
        if (! is_null($tagIDs) ){
            $article->tags()->sync($tagIDs);
        }
        //$article->tags()->attach($request->input('tagList'));
        return redirect('myArticles');
    }

    public function delete($id){
        //$article = Article::findOrFail($id);
        //$article->runSoftDelete();
        //return redirect('articles');

        return ('not available yet');
    }

    private function uploadFile(){

    }

}
