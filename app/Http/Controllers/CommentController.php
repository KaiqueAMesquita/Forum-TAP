<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function listAllComments(){
    $comments = Comment::with('post', 'commentable')->get();

        return view('comments.listAllComments', ['comments' => $comments]);
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
    $comment = Comment::with('post')->where('id', $uid)->first();


    return view('comments.listCommentById', ['comment' => $comment]);
    }

    public function deleteComment(Request $request, $uid) {
        $comment = Comment::where('id', $uid)->first();
        $tid = $comment->commentable_id;

        $comment->delete();

        return redirect()->route('ListTopicById', $tid)
                ->with('message', 'Atualizado com sucesso!');
    }

    public function editComment(Request $request,$uid) {
        $comment = Comment::where('id', $uid)->first();

      return view('comments.editComment', ['comment' => $comment]);
}

    public function updateComment(Request $request, $uid) {

        $request->validate([
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $comment = Comment::where('id', $uid)->first();
        $comment->content = $request->content;

        $imagePath = $comment->post->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $comment->save();

        $comment->post()->update([
            'image' => $imagePath
        ]);

        return redirect()->route('ListTopicById', [$comment->commentable_id ])
                ->with('message', 'Atualizado com sucesso!');
    }


}
