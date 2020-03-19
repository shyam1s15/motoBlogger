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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;


// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

// Route::get('/', 'ChatkitController@index');
// Route::post('/', 'ChatkitController@join');
// Route::get('chat', 'ChatkitController@chat')->name('chat');

Route::get('/','loginController@getLogIn');
Route::post('logout', 'ChatkitController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/upload', 'PostsController@fun')->name('upload');

Route::get('/upload', 'PostsController@index');


Route::get('/all', function() {
    return view('user_pages.all_imgs');
});

Route::get('sample', function () {
    return view('sample');
});

// the below routes are used for user logins and signups

Route::get('login_users', 'loginController@getLogIn');
Route::post('login_users', 'loginController@postLogIn');

Route::get('/logout', function () {
    Session::forget("logged_user");
    return redirect()->back();
});
// 
Route::get('forgot_pass', 'loginController@getForgotPass');
Route::post('forgot_pass', 'loginController@postForgotPass');
Route::post('forgot_pass1', 'loginController@postResetPass');

Route::get('forgotPassMail','loginController@getResetPass');


Route::get('sign_up_users','loginController@getSignUp');
Route::post('sign_up_users','loginController@postSignUp');


Route::get('mail', 'loginController@mail');

Route::get('checkMail', 'loginController@checkMail');


// the below routes will be used for creating boats 
Route::get('boat/create','boatsController@create')->middleware('checkLoggedIn');
Route::post('boat/create', 'boatsController@getCreated');


Route::get('boat/show', 'boatsController@getShowBoatsOfUserPage')->middleware('checkLoggedIn');


// searching routes here

Route::get('search','searchController@search');



// testing links below

Route::get('test/sessions','testController@testSessions');
Route::get('test/sessions2',function (){
    return view("testings.sessioning2");
});

Route::get('test/boat', function () {
    return view('layouts.master_layouts.boat');
});

Route::get('{slug}', function($slug) {
    $page = \DB::table("students")->where('email','=',$slug)->first();

    if ( is_null($page) )
        return Event::first('404');

    // return View::make('page')->with($page);
    print_r ($page);
});


Route::get('test/boat2', function () {
    return view("layouts.master_layouts.search_boat");
});

Route::get('/drone/price', 'droneController@price');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('test/react', function() {
    //
    return view('test.react');
});


Route::get('boat/name/{bName}/{bId}', 'boatsController@showDetailedBoat')->middleware('checkLoggedIn');
Route::get('student/name/{sName}/{sId}', 'StudentsController@showDetailedStudent')->middleware('checkLoggedIn');

Route::get('test/section', function() {
    //
    return view('test.section_page');
});


Route::get('test/ajaxReq/joinOrLeave', 'boat\joinController@joinOrLeave');
Route::get('test/ajaxReq/knowJoinOrLeave', 'boat\joinController@knowJoinOrLeave');

Route::get('test/ajaxReq/ResponsedAnswer','boat\contentController@storeResponseOfMcq');

Route::get('posts/test/{bName}/{bId}', 'boat\contentController@createContent');


Route::get('ajax/make/mcq','boat\contentController@storeMcq');

Route::get('test/test5', function () {
    return view('test.test5');
});


Route::get('posts/test/{bId}/{uId}/collab', 'boat\collabrationEditAndViewController@showUserPosts');
Route::get('posts/test/{bId}/{uId}/showCollab', 'boat\collabrationEditAndViewController@showUserPostsResponse');

