<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
//    public function about(){
//        $data = [];
//        $data['first'] = 'Allen';
//        $data['last'] = 'Gao';
//        return view('pages.about', $data);
//    }
    public function about(){
        $first = 'Allen';
        $last = 'Gao';
        $people = ['jason', 'michael', 'david'];

        return view('pages.about', compact('first', 'last', 'people'));
    }

    public function contact(){
        $first = 'Allen';
        $last = 'Gao';
        return view('pages.contact', compact('first', 'last'));}
}
