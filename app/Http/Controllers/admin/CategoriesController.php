<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view("admin.categories.index", ['categories'=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>['required', 'min:5'],
            'description'=>['required', 'min:5'],
            'image'=>'required|image|mimes:jpg,png,jpeg|max:2048',
            'status'=> 'required'
        ]);
        // dd($request->all());
        $category = new Category();
        $category->name = request('name');
        $category->description = request('description');
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/categories'),$imageName);
        $category->image = $imageName;
        $category->status= request('status');
        $category->save();
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // dd($category->questions);
        return view('admin.categories.show', ['category'=>$category]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // dd($category);
        return view('admin.categories.edit', ['category'=>$category]);
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
        $category = Category::find($id);
        $category->name = request('name');
        $category->description = request('description');
        $category->status = request('status');
        if(request('image') !== null){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/categories'),$imageName);
            $category->image = $imageName;
        }
        $category->save();
        return redirect('admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('admin/categories');
    }
    public function changeStatus($id){
        $category = Category::find($id);
        if($category->status == 0){
            $category->status = 1;
        }elseif($category->status == 1){
            $category->status = 0;
        }
        $category -> save();
        return redirect('admin/categories');
    }
}
