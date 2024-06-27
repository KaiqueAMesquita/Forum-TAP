<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function(){
    return view('index');
})->name('Home');




//User
Route::match(['get', 'post'], '/login',
    [AuthController::class, 'loginUser']
)->name('login');

Route::get('/logout',
    [AuthController::class, 'logoutUser']
)->name('Logout');

Route::match(['get', 'post'],'/register',
    [UserController::class, 'registerUser']
)->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/users',
        [UserController::class, 'listAllUsers']
    )->name('ListAllUsers');

    Route::get('/users/{uid}',
        [UserController::class, 'listUser']
    )->name('ListUserById');

    Route::get('/users/{uid}/edit',
    [UserController::class, 'editUser']
    )->name('EditUser');

    Route::put('/users/{uid}/update',
    [UserController::class, 'updateUser']
    )->name('UpdateUser');

    Route::delete('/users/{uid}/delete',
    [UserController::class, 'deleteUser']
    )->name('ListUser');

    Route::put('/users/{uid}/update',
        [UserController::class, 'updateUser']
    )->name('UpdateUser');

    Route::delete('/users/{uid}/delete',
        [UserController::class, 'deleteUser']
    )->name('DeleteUser');
});

//Topic
Route::get('/topics',
    [TopicController::class, 'listAllTopics']
)->name('ListAllTopics');
Route::get( '/topics/{uid}',
    [TopicController::class, 'listTopicById']
)->name('ListTopicById');

Route::get( '/topics/edit',
    [TopicController::class, 'editTopic']
)->name('EditTopic');

//Tag
Route::get('/tags',
[TagController::class, 'ListAllTags']
)->name('tags');

Route::get( '/tags/{uid}',
[TagController::class, 'listTagById']
)->name('ListTagById');

Route::get( '/tags/edit',
[TagController::class, 'editTag']
)->name('EditTag');

//Post
Route::get('/posts',
[PostController::class, 'listAllPosts']
)->name('ListAllPosts');

Route::get( '/posts/{uid}',
[PostController::class, 'listPostById']
)->name('ListPostById');

Route::get( '/posts/edit',
[PostController::class, 'editPost']
)->name('EditPost');
