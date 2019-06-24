<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UsersController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('public.profile' , ['user'=>$user]);
    }
    public function updateInfo(Request $request, $id){
        $user = Auth::user();
        $user->username = request('username');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->save();
        return redirect('/profile');
    }
}
