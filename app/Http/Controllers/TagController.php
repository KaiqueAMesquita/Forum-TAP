<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listTags(Request $request) {


        return view('tags.ListAlltags');
    }

    public function listTag(Request $request,$uid) {

        return view('tags.ListTagById');

    }

    public function editTag(Request $request) {
        return view('tags.EditTag');

    }
}
