<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('questions', 'QuestionController')->except('show');
Route::get('/questions/{slug}', 'QuestionController@show')->name('questions.show');
Route::resource('questions.answers', 'AnswerController')->except(['index', 'show', 'create']);
Route::post('answer/{answer}/best-answer', 'AnswerController@bestAnswer')
    ->name('answers.bestAnswer');
Route::post('question/{question}/favourite', 'FavouritesController@store')
    ->name('questions.favourite');
Route::delete('question/{question}/unfavourite', 'FavouritesController@destroy')
    ->name('questions.unfavourite');

Route::post('questions/{question}/vote/{vote}', 'VotesController@voteQuestion')
->name('questions.vote');

Route::post('answers/{answer}/vote/{vote}', 'VotesController@voteAnswer')
    ->name('answers.vote');
