<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Routes for homepage 
Route::get('/', 'front\HomeController@index');
Route::get('/categories' , 'front\HomeController@categories')->name('categories');
Route::get('/contact-page' , 'front\HomeController@contactPage');
Route::get('/categories/paginate', 'front\HomeController@categoriesPaginate');
Route::get('/categories/{category}/quiz', 'front\HomeController@categoryQuiz');
Route::post('/categories/{category}/quiz-submit', 'front\HomeController@categoryQuizSubmit');
Route::get('/categories/{category}/score', 'front\HomeController@categoryQuizScore');
Route::get('/users/roles', 'front\HomeController@usersRoles');
Route::get('/profile', 'front\UsersController@show');
Route::put('/profile/{id}' , 'front\UsersController@updateInfo');

Auth::routes();

// Routes for categories
Route::get('/admin/categories', 'admin\CategoriesController@index');
Route::get('/admin/categories/create', 'admin\CategoriesController@create');
Route::post('/admin/categories', 'admin\CategoriesController@store');
Route::get('/admin/categories/{category}/edit', 'admin\CategoriesController@edit');
Route::put('/admin/categories/{category}', 'admin\CategoriesController@update');
Route::delete('/admin/categories/{category}', 'admin\CategoriesController@destroy');
Route::get('/admin/categories/{category}', 'admin\CategoriesController@show');
Route::get('/admin/categories/{category}/change-status', 'admin\CategoriesController@changeStatus');


// Routes for questions
Route::get('/admin/categories/{category}/questions/create' , 'admin\QuestionsController@create');
Route::post('/admin/categories/{category}/questions' , 'admin\QuestionsController@store');
Route::get('/admin/questions/{question}/edit' , 'admin\QuestionsController@edit');
Route::put('/admin/questions/{question}', 'admin\QuestionsController@update');
Route::delete('/admin/questions/{question}', 'admin\QuestionsController@destroy');
Route::get('/admin/questions/{question}', 'admin\QuestionsController@show');
Route::get('/admin/questions/{question}/change-status', 'admin\QuestionsController@changeStatus');

//Routes for answers
Route::get('/admin/questions/{question}/answers/create' , 'admin\AnswersController@create' );
Route::post('/admin/questions/{question}/answers/' , 'admin\AnswersController@store');
Route::get('/admin/answers/{answer}/edit' , 'admin\AnswersController@edit');
Route::put('/admin/answers/{answer}' , 'admin\AnswersController@update');
Route::get('/admin/answers/{answer}/change-status' , 'admin\AnswersController@changeStatus');
Route::delete('/admin/answers/{answer}', 'admin\AnswersController@destroy');

// Routes for users
Route::get('/admin/users', 'admin\UsersController@index');
Route::get('/admin/users/create', 'admin\UsersController@create');
Route::post('/admin/users', 'admin\UsersController@store');
Route::get('/admin/users/{user}/edit' , 'admin\UsersController@edit');
Route::put('/admin/users/{user}' , 'admin\UsersController@update');
Route::get('/admin/users/{user}/change-status' , 'admin\UsersController@changeStatus');
Route::delete('/admin/users/{user}' , 'admin\UsersController@destroy');