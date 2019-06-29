<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
{
    public function editInfo(){
        $user = Auth::user();
        return view('public.profile' , ['user'=>$user]);
    }
    public function updateInfo(Request $request){
        $user = Auth::user();
        $user->username = request('username');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->save();
        return redirect('/profile');
    }
    public function editPassword(){
        $user = Auth::user();
        return view('public.editpassword', ['user'=>$user]);
    }
    public function updatePassword(Request $request){
        $rules = array(
            'old_password'            => 'required',     // required and must be unique in the ducks table
            'new_password'         => 'required',
            're_new_password' => 'required|same:new_password'           // required and has to match the password field
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors(['validator'=>'erori multe cumetre']);
        }
        $user = Auth::user();
        $db_password = Auth::User()->password; 
        if(Hash::check($request['old_password'], $db_password)) {
            $user->password = Hash::make(request('new_password'));
            $user->save();
        } else{
            return redirect()->back()->withErrors(['validator'=>"old password doesn't match"]);
        }    
        return redirect('/profile')->with('message', 'IT WORKS!');
    }
    public function deleteAccount(){
        $user = Auth::user();
        return view('public.delete' , ['user'=>$user]);
    }
    public function destroy(Request $request){
        $rules = array(
            'password'            => 'required'       
        );
        $validator = Validator::make($request->all(), $rules);
        $user = Auth::user();
        // dd($user);
        $db_password = Auth::User()->password; 
        if(Hash::check($request['password'], $db_password)){
            $user->roles()->detach();
            $user->delete();
            return redirect('/');
        }
        else{
            return redirect()->back()->withErrors(['validator'=>"old password doesn't match"]);
        }
    }
}