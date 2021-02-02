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

Route::get('/', 'PagesController@index')->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/my_dash', 'UsersController@dashboard')->name('myDash');
Route::resources([
  'user' => 'UsersController',
  'task' => 'TasksController',
  'update' => 'UpdatesController',
]);

// Auth::routes(['register' => false]);
require __DIR__.'/auth.php';


// Custom routes
Route::get('/tasks', 'TasksController@index');
Route::post('/find_task', 'PagesController@findTask')->name('findTask');
Route::get('/update/create/{task_id}','UpdatesController@create');


// Preview emails
Route::get('/preview', 'PagesController@preview');
