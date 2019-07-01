<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');  
    }
    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users'=> $users]);
    }
    public function create(){
        return view("admin.users.create");
    }
    public function store(Request $request){
        $user = new User();
        $user->username = request('username');
        $user->email = request('email');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->password = request('password');
        $user->role = request('role');
        $user->status = request('status');
        $user->save();
        return redirect('admin/users');
    }
    public function edit($id){
        $user = User::find($id);
        return view('admin.users.edit', ['user'=>$user]);
    }
public function update(Request $request, $id){
        $user = User::find($id);
        $user->username = request('username');
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->password = request('password');
        $user->role = request('role');
        $user->status = request('status');
        $user->save();
        return redirect('admin/users');
    }
    public function changeStatus($id){
        $user = User::find($id);
        $user->status == 0 ? $user->status = 1 : $user->status = 0;
        $user->save();
        return redirect('admin/users');
    }
    public function destroy($id){
        User::find($id)->delete();
        return redirect('admin/users');
    }
}
?>