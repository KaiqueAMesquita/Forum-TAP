<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\TopicController;
use App\Models\Topic;

class HomeController extends Controller
{
    public function index(){
        $topics = Topic::with('category')->orderBy('created_at', 'desc')->limit(4)->get();

        return view('index', ['topics' => $topics]);
    }
}
