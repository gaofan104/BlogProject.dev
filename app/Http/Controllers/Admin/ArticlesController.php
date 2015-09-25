<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function addTag(){
        $tags = Tag::all();
        return view('admin.tags', compact('tags'));
    }

    public function createTag(Request $request){
        $tag = Tag::create($request->all());
        $tags = Tag::all();
        return view('admin.tags', compact('tags'));
    }
}
