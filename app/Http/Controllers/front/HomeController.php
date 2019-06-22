<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Question;
class HomeController extends Controller
{
    public function index(){
        $users = User::where('status', '=', '1')->get();
        $categories = Category::where('status', '=', '1')->get();
        $questions = Question::where('status', '=', '1')->get();
        return view('public.homepage' , ['users'=>$users , 'categories'=>$categories , 'questions'=>$questions]);
    }
    public function categories(){
        $categories = Category::where('status', '=' , '1')->paginate(3);
        // dd($categories);
        return view('public.categories' , ['categories'=>$categories]);
    }
    public function categoriesPaginate(){
        $categories = Category::where('status', '=' , '1')->paginate(3);
        return $categories;
    }
    public function categoryQuiz($id){
        $category = Category::find($id);
        return view('public.quiz', ['category'=>$category]);
    }
    public function categoryQuizSubmit(Request $request, Category $category){
        // dd($request->all());
        $questions_re = $request['questions'];
        // dd($questions_re);
        $number_correct_answers = 0;
        foreach($category->questions as $question){
            $answer_id_by_user = $questions_re[$question->id];
            foreach($question->answers as $answer){
                if($answer->id == $answer_id_by_user && $answer->valid == '1'){
                    $number_correct_answers++;
                    break;
                }
            }
        }
        echo $number_correct_answers;
        session(['number_of_correct_answers'=>$number_correct_answers , 
                'number_of_questions'=>count($questions_re)]);
        // dd($request->session()->all());
        // $value = session('key');
        return redirect('categories/'.$category->id.'/score');

    }
}
