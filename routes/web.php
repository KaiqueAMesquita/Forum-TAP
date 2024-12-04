<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
Route::get('/',
    [HomeController::class, 'index']
)->name('Home');


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

    Route::get('/users/{uid}/moderator',
    [UserController::class, 'moderateUser']
)->name('ModeratorUser');

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


Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'comments'], function(){
        Route::post('/create',
    [CommentController::class, 'createComment']
)->name('CreateComment');
    Route::get('/',
[CommentController::class, 'listAllComments']
)->name('ListAllComments');
    Route::get('/',
[CommentController::class, 'listCommentById']
)->name('ListCommentById');
    Route::delete('{uid}/delete',
[CommentController::class, 'deleteComment']
)->name('DeleteComment');
    Route::get('{uid}/edit',
[CommentController::class, 'editComment']
)->name('EditComment');
    Route::put('{uid}/update',
[CommentController::class, 'updateComment']
)->name('UpdateComment');

});
});

Route::middleware('auth')->group(function () {
   //Topic
Route::group(['prefix' => 'topics'], function(){
    Route::match(['get', 'post'],'/create',
     [TopicController::class, 'createTopic']
 )->name('CreateTopic');
     Route::get('/',
     [TopicController::class, 'listAllTopics']
 )->name('ListAllTopics');
    Route::get('/my',
 [TopicController::class, 'myTopics']
)->name('MyTopics');
Route::get('/search',
 [TopicController::class, 'search']
)->name('Search');
 Route::get( '/{uid}',
     [TopicController::class, 'listTopicById']
 )->name('ListTopicById');
 Route::delete( '{uid}/delete',
     [TopicController::class, 'deleteTopic']
 )->name('DeleteTopic');
 Route::get( '/edit/{uid}',
     [TopicController::class, 'editTopic']
 )->name('EditTopic');
 Route::put( '/update/{uid}',
 [TopicController::class, 'updateTopic']
)->name('UpdateTopic');

 });


 //Category

Route::get('/categories',
[CategoryController::class, 'listAllCategories']
)->name('ListAllCategories');

Route::middleware('auth')->group(function () {
Route::match(['get', 'post'],'/categories/create',
    [CategoryController::class, 'createCategory']
)->name('CreateCategory');

Route::get( '/categories/{uid}',
[CategoryController::class, 'listCategoryById']
)->name('ListCategoryById');

Route::get( '/categories/{uid}/edit',
[CategoryController::class, 'editCategory']
)->name('EditCategory');


Route::put('/categories/{uid}/update',
[CategoryController::class, 'updateCategory']
)->name('UpdateCategory');

Route::delete('/categories/{uid}/delete',
[CategoryController::class, 'deleteCategory']
)->name('DeleteCategory');
});

});







//Tag
Route::match(['get', 'post'],'/tags/create',
    [TagController::class, 'createTag']
)->name('CreateTag');

Route::get('/tags',
[TagController::class, 'listAllTags']
)->name('ListAllTags');

Route::get( '/tags/{uid}',
[TagController::class, 'listTagById']
)->name('ListTagById');

Route::get( '/tags/{uid}/edit',
[TagController::class, 'editTag']
)->name('EditTag');

Route::put('/tags/{uid}/update',
[TagController::class, 'updateTag']
)->name('UpdateTag');

Route::delete('/tags/{uid}/delete',
[TagController::class, 'deleteTag']
)->name('DeleteTag');

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
