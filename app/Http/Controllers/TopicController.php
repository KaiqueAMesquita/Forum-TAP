<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;

class TopicController extends Controller
{

    public function listAllTopics(){
        $topics = Topic::with('category')->get();
        return view('topics.listAllTopics', ['topics' => $topics]);

    }
    public function myTopics(Request $request) {
        $userId = Auth::id();


        $topics = Post::where('user_id', $userId)
                      ->whereHasMorph('postable', Topic::class)
                      ->with('postable.category')
                      ->get()
                      ->pluck('postable')
                      ->unique('id');

        return view('topics.myTopics', ['topics' => $topics]);
    }

    public function createTopic(Request $request) {

        $userId = Auth::id();
        if ($request->method() === 'GET') {
            $categories = Category::all();
            $tags = Tag::all();
            return view('topics.createTopic', ['categories' => $categories, 'tags' => $tags]);

        } else {

            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'category' => 'required',
                'tags' => 'array'
            ]);
            $imagePath = '';

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imagePath = $request->file('image')->store('images', 'public');
            }


            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'category_id' => $request->category,
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $imagePath,

            ]);


            $topic->tags()->sync($request->tags);


            return redirect()
                    ->route('MyTopics')
                    ->with('success', 'Topico criada com sucesso.');

        }

    }


    public function search(Request $request){
        $search = $request->query('search');
        $topics = Topic::where('title', 'like', '%' . $search . '%')->get();

        return view('topics.search', ['topics' => $topics]);
    }


    public function deleteTopic(Request $request, $uid) {
        $topic = Topic::where('id', $uid)->first();
        $topic->tags()->detach();
        $topic->post()->delete();
        $topic->delete();
        return redirect()->route('Home')
                ->with('message', 'Atualizado com sucesso!');
    }
    public function listTopicById(Request $request, $uid)
    {
        $topic = Topic::with('post')->where('id', $uid)->first();

        $comments = Comment::with(['replies.post'])
        ->where('commentable_id', $uid)
        ->where('commentable_type', Topic::class)
        ->orderBy('created_at', 'asc')
        ->get();

        return view('topics.listTopicById', ['topic' => $topic,'comments' => $comments]);
    }

    public function editTopic($uid)
{
    $topic = Topic::with('tags', 'category')->findOrFail($uid);
    $categories = Category::all();
    $tags = Tag::all();

    return view('topics.editTopic', ['topic' => $topic,'categories' => $categories,'tags' => $tags,]);
}

    public function updateTopic(Request $request, $uid) {

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'tags' => 'array'
        ]);

        $topic = Topic::where('id', $uid)->first();
        $topic->title = $request->title;
        $topic->description = $request->description;

        $imagePath = $topic->post->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
        }


        $topic->save();

        $topic->post()->update([
            'image' => $imagePath,
           ]);

        $topic->tags()->sync($request->tags);


        return redirect()->route('ListTopicById', [$topic->id])
                ->with('message', 'Atualizado com sucesso!');
    }






}
