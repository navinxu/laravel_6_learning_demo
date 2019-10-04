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

Route::get('/hello', function() {
    return 'Hello, World.';
});

Route::match(['get', 'post'], '/match', function() {
    return 'match get and post';
});

Route::any('/any', function() {
    return  'any';
});

Route::any('/csrf', function() {
    return view('csrf');
});

Route::redirect('/redirect', '/any');
Route::redirect('/redirect301', '/match', 302);
//Route::redirect('/redirectother', '/any', 800); // 出现错误

Route::permanentRedirect('/perredirect', '/hello');

Route::view('/view', 'view_routes', ['name' => 'Navin', 'age' => '18']);

Route::get('user/{id}', function ($id) {
    return 'User ' . $id;
});

Route::get('posts/{post_id}/comments/{comment}', function ($postId, $commentId) {
    return "post: {$postId}, comment: {$commentId}";
});

Route::get('userName/{name?}', function ($name = null) {
    return "UserName: {$name}";
});

Route::get('userName2/{name?}', function ($name = 'Navin') {
    return 'User: ' . $name;
});

Route::get('user2/{name}', function ($name) {
    return $name;
})->where('name','[A-Za-z]+');

Route::get('user3/{id}', function ($uid) {
    return $uid;
})->where('id', '[0-9]+');

Route::get('user4/{id}/{name}', function ($uid, $uname) {
    return $uid . ' : ' . $uname;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

Route::get('user5/{id}', function ($id){
    return $id;
});

Route::get('/user6/{name}', function ($name) {
    return $name;
});

Route::get('search/{search}', function ($search) {
    return $search;
})->where('where', '.*');

Route::get('user7/profile', function() {
    return 'user7/profile';
})->name('profile');

Route::redirect('user7/profile', '/geturl', 302);

Route::get('/geturl', function() {
    return route('profile');
});

Route::get('user8/{userId}', function ($userId) {
    return $userId;
})->name('user');
Route::get('/redirect_url', function() {
    return redirect()->route('user', ['userId' => '123'], 302);
});
