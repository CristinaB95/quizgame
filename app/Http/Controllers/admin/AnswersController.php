<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Question;
use App\Answer;
use App\Category;
use Illuminate\Support\Facades\Db;
use Auth;
class AnswersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
        
    }
    public function create(Category $category, Question $question){
        return view('admin/answers/create', ['category'=> $category , 'question'=>$question]);
    }
    public function store(Request $request, Category $category, Question $question ){
        $answer = new Answer();
        $answer->content = request("content");
        $answer->question_id = $question->id;
        $answer->status = request('status');
        $answer->valid = request('valid');
        if($answer->valid){
            DB::table('answers')->where('question_id', $question->id)
                                ->update(['valid'=>0]);
        }
        $answer->save();
        return redirect('admin/questions/'.$question->id);

    }
    public function edit($id, Category $category){
        // $user = Auth::user()->authorizeRoles(['admin']);
        // dd($user);
        $answer = Answer::find($id);
        return view('admin/answers/edit', ['answer'=>$answer , 'category'=>$category]);
    }
    public function update(Request $request, $id){
        
        $answer = Answer::find($id);
        $question = Question::find($answer->question_id);
        $answer->content = request('content');
        $answer->status = request('status');
        $answer->valid = request('valid');
        $answer->save();
        return redirect('admin/questions/'.$answer->question_id);
    }
    public function changeStatus($id){
        $answer = Answer::find($id);
        // dd($answer);
        if($answer->status == 0){
            $answer->status = 1;
        }else{
            $answer->status = 0;
        }
        $answer->save();
        return redirect('admin/questions/'.$answer->question_id);
    }
    public function destroy($id){
        $answer = Answer::find($id);
        Answer::find($id)->delete();
        return redirect('admin/questions/'.$answer->question_id);
    }
}
