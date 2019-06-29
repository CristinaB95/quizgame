<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;
use App\User;
use App\Contact;
class HomePageController extends Controller
{
    public function index(){
        $numberCategories = Category::count();
        $numberQuestions = Question::count();
        $numberMessages = Contact::count();
        $numberNewUsers = User::where('created_at' , '>' , date('Y-m-d H:i:s' , strtotime('-1 day' , time())))->count();
        return view('admin.index', ['numberCategories'=>$numberCategories , 'numberQuestions'=>$numberQuestions , 'numberNewUsers'=>$numberNewUsers , 'numberMessages'=> $numberMessages]);
    }



}