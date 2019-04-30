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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth']], function(){
  Route::get('/', 'DashboardController@dashboard')->name('admin.index');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/page', function () {
    return view('page');
});

Route::get('/tasks', function ()
{
$tasks = DB::table('tasks') ->get();
return view('tasks.index', compact('tasks'));
  }
);

Route::get('/tasks/{task}', function ($id)
{
$task = DB::table('tasks') ->find($id);
//dd ($task);
return view('tasks.show', compact('task'));
  }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
