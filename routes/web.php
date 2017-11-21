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
use App\User;

Route::middleware(['web','auth'])->group(function(){
    Route::get('/', function () {
        return view('dashboard.dashboard');
    });

    Route::resource('/user','UserController');

    Route::resource('/project','ProjectController');

    Route::post('/project/getUsersImage','ProjectController@getUsersImage');

    /*update user */
    Route::get('/user/update/{id}',function ($id){
        $user = User::find($id);

        return view('user.update',compact('user'));
    });

    /* delete user */
    Route::get('/user/delete/{id}','UserController@destroy');

    Route::post('/project/getDeveloperImage','ProjectController@getDeveloperImage');

//    Route::get('/user/detail/{id}',function ($id){
//        $user = User::find($id);
//        return view('user.detail',compact('user'));
//    });




    Route::get('/myproject','ProjectController@myProject')->name('project.myProject');

    Route::post('/project/getUsersImage','ProjectController@getUsersImage');
});
Route::post('/test',function(){
    return view('testing');
});

Auth::routes();

