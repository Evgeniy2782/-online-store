<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    public function profileUser(){
        $id = Auth::id();
        $user = User::where('id', $id)->get();

        return view('shop-users/profileUser', compact('user'));
    }

    public function profileEditeUser($id){
        $user = User::where('id', $id)->get();
        return view('shop-users/profileUser', compact('user'));
    }

    public function viewEditUsers(){
        $users = User::all();
        return view('shop-users/viewEditUser', compact('users'));
    }

    public function authUser(){
        return view('auth');
    }
}
