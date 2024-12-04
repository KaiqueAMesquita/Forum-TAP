<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function listAllComments(Request $request){
        $comments = Comment::all();

        return view('listAllComments', ['comments' => $comments]);
    }

    public function createComment(Request $request){

        $request->validate([
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string|in:App\Models\Topic,App\Models\Comment',
        ]);
        $imagePath = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $comment = Comment::create([
            'content' => $request->content,
            'commentable_id' => $request->commentable_id,
            'commentable_type' => $request->commentable_type,

        ]);


        $comment->post()->create([
            'user_id' => Auth::id(),
            'image' => $imagePath,


        ]);



        return redirect()
                ->route('ListTopicById',$request->commentable_id)
                ->with('success', 'Comenatio criada com sucesso.');
    }



    public function listCommentById(Request $request, $uid){
    // TO DO: implement listCommentById logic
    }

    public function deleteComment(Request $request, $uid) {
        $comment = Comment::where('id', $uid)->first();
        $tid = $comment->commentable_id;

        $comment->delete();

        return redirect()->route('ListTopicById', $tid)
                ->with('message', 'Atualizado com sucesso!');
    }

    public function editComment(Request $request, $uid){
    // TO DO: implement editComment logic
    }

    public function updateComment(Request $request, $uid){
    // TO DO: implement updateComment logic
    }

}
