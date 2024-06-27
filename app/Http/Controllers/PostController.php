<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function listPosts(Request $request) {


        return view('posts.ListAllPosts');
    }

    public function listPost(Request $request,$uid) {

        return view('posts.ListPostById');

    }

    public function editPost(Request $request) {
        return view('posts.EditPost');

    }
}
