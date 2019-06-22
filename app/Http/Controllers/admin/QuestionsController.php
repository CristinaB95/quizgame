<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Question;
use App\Answer;
use App\User;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Category $category)
    {
        return view('admin.questions.create', ["category"=>$category]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $question = new Question();
        $question->content =request("content");
        $question->status = request('status');
        $question->category_id = $category->id;
        $question->user_id= 1;
        $question->save();
        return redirect('admin/categories/'.$category->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category , Question $question , Answer $answer)
    {
        // dd($question->answers);
        return view('admin.questions.show', ['category'=>$category ,'question'=>$question, 'answer'=>$answer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        // dd($category);
        return view('admin.questions.edit', ['question'=>$question]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->content = request('content');
        $question->status = request('status');
        $question->save();
        return redirect('admin/categories/'.$question->category_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question =  Question::find($id);
        Question::find($id)->delete();
        return redirect('admin/categories/'.$question->category_id);
    }
    public function changeStatus($id){
        $question = Question::find($id);
        if($question->status == 0){
            $question->status = 1;
        }else{
            $question->status = 0;
        }
        $question->save();
        return redirect('admin/categories/'.$question->category_id);
    
    }
}
