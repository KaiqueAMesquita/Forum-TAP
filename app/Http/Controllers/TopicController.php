<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listTopics(Request $request) {


        return view('topics.listAllTopics');
    }

    public function listTopic(Request $request,$uid) {

        return view('topics.ListTopicById');

    }

    public function editTopic(Request $request) {
        return view('topics.editTopic');

    }


}
