<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Question;
use App\Contact;
use Auth;
class HomeController extends Controller
{
    public function index(){
        $users = User::where('status', '=', '1')->get();
        $categories = Category::where('status', '=', '1')->get();
        $questions = Question::where('status', '=', '1')->get();
        return view('public.homepage' , ['users'=>$users , 'categories'=>$categories , 'questions'=>$questions]);
    }
    public function categories(){
        $categories = Category::where('status', '=' , '1')->paginate(6);
        // dd($categories);
        return view('public.categories' , ['categories'=>$categories]);
    }
    public function contactPage(){
        return view('public.contact');
    }
    public function contactPageSend(Request $request){
        request()->validate([
            'name'=>['required', 'min:5'],
            'message'=>['required', 'min:10'],
            'email'=>'required|email|'
        ]);
        $contact = new Contact();
        // dd($request->all());
        $contact->content = request("message"); 
        $contact->name = request("name"); 
        $contact->email = request("email"); 
        $contact->save();
        return redirect('/');
    }
    public function categoriesPaginate(){
        $categories = Category::where('status', '=' , '1')->paginate(3);
        return $categories;
    }
    public function categoryQuiz($id){
        if(Auth::check() != true){
            return redirect('/login');
        }
        $category = Category::find($id);
        $questions = Question::where('category_id' , '=' , $id)->where('status' , '=' , '1')->inRandomOrder()->limit(5)->get();
        if(!count($questions)){
            return redirect('/categories');
        }
        return view('public.quiz', ['category'=>$category , 'questions'=>$questions]);
    }
    public function categoryQuizSubmit(Request $request, Category $category){
        // dd($request->all());
        $questions_re = $request['questions'];
        $questions_show = $request['questions_show'];
        // dd($questions_re);
        $number_correct_answers = 0;
        foreach($category->questions as $question){
                if(isset($questions_re[$question->id])){
                    $answer_id_by_user = $questions_re[$question->id];
                    foreach($question->answers as $answer){
                        if($answer->id == $answer_id_by_user && $answer->valid == '1'){
                            $number_correct_answers++;
                            break;
                        }
                    }
                }
        }
        $score = $number_correct_answers * 10;
        session(['number_of_correct_answers'=>$number_correct_answers , 
                'number_of_questions'=>count($questions_show),
                'score_quiz'=>$score]);
        // dd($request->session()->all());
        // $value = session('key');
        $user = Auth::user();
        $user->score = $user->score + $score;
        $user->save();
        return redirect('categories/'.$category->id.'/score');
    }
    public function categoryQuizScore(Category $category){
        $number_of_correct_answers = session('number_of_correct_answers');
        $number_of_questions = session('number_of_questions');
        $score_quiz = session('score_quiz');
        return view('public.score' , ['number_of_questions'=>$number_of_questions , 
                                    'number_of_correct_answers'=>$number_of_correct_answers ,
                                    'title_good_score'=>"Congratulations",
                                    'description_good_score'=>"You did an amazing job",
                                    'title_bad_score'=>"Good effort!",
                                    'description_bad_score'=>"Try again for better results",
                                    'score_quiz'=> $score_quiz]);
    }
    public function usersRoles(){
        $user = Auth::user();
        dd($user->authorizeRoles(['admin']));
    }
}
