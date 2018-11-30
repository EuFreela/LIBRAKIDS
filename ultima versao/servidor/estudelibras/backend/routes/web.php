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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
   
    //CATEGORY
    Route::get('/category-create','CategoryController@getCreate')->name('category.getcreate');
    Route::post('/category-create','CategoryController@postCreate')->name('category.postcreate');
    Route::get('/category-list','CategoryController@getList')->name('category.getlist');
    Route::get('/category-edit/{id}','CategoryController@getEdit')->name('category.getedit');
    Route::put('/category-edit/{id}','CategoryController@putEdit')->name('category.putedit');
    Route::get('/category-del/{id}','CategoryController@Delete')->name('category.delete');

    //CARDS
    Route::get('/card-create','CardController@getCreate')->name('card.getcreate');
    Route::post('/card-create','CardController@postCreate')->name('card.postcreate');
    Route::get('/card-list','CardController@getList')->name('card.getlist');
    Route::get('/card-edit/{id}','CardController@getEdit')->name('card.getedit');
    Route::put('/card-edit/{id}','CardController@putEdit')->name('card.putedit');
    Route::get('/card-del/{id}','CardController@Delete')->name('card.delete');

    //QUIZ
    Route::get('/quiz','QuizController@getCreate')->name('quiz.getcreate');
    Route::post('/quiz','QuizController@postCreate')->name('quiz.postcreate');
    Route::get('/quiz-list','QuizController@getList')->name('quiz.getlist');
    Route::get('/quiz-edit/{id}','QuizController@getEdit')->name('quiz.getedit');
    Route::put('/quiz-edit/{id}','QuizController@putEdit')->name('quiz.putedit');
    Route::get('/quiz-del/{id}','QuizController@Delete')->name('quiz.delete');

    //HISTORY
    Route::get('/history','HistoryController@getView')->name('history.getview');
    Route::get('/history-del','HistoryController@Delete')->name('history.delete');
});
