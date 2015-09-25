<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function manageUser(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUser(User $user){
        //dd($user);
        $user->delete();
        return redirect()->back();
    }

}
