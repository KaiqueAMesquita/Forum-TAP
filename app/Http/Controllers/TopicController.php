<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Post;

class TopicController extends Controller
{

    public function listAllTopics(){
        $topics = Topic::all();
        return view('topics.listAllTopics', ['topics' => $topics]);

    }

    public function createTopic(Request $request) {

        $userId = Auth::id();
        if ($request->method() === 'GET') {
            $categories = Category::all();
            return view('topics.createTopic', ['categories' => $categories]);

        } else {

            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|string',
                'status' => 'required|int',
                'category' => 'required'
            ]);

            $topic = Topic::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category
            ]);

            $topic->post()->create([
                'user_id' => Auth::id(),
                'image' => $request->image,
                // 'image' => $request->file('image')->store('images', 'public')
            ]);

            // $post = Post::create([
            //     'image' => $request->input('image'),

            //     // 'created_at' => now(),
            //     // 'updated_at' => now(),
            // ]);
            // $topic->posts()->save($post);

            return redirect()
                    ->route('ListAllCategories')
                    ->with('success', 'Topico criada com sucesso.');

        }

    }

    public function listTopic(Request $request,$uid) {

        return view('topics.ListTopicById');

    }

    public function deleteTopic(Request $request, $uid) {
        Topic::where('id', $uid)->delete();
        return redirect()->route('ListAllTopics')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function listTopicById(Request $request, $uid) {


        $topic = Topic::where('id', $uid)->first();
        return view('topics.listTopicById', ['topic' => $topic]);

    }
    public function editTopic(Request $request, $uid) {
        $topic = Topic::where('id', $uid)->first();
        $topic->title = $request->title;


        $topic->save();
        return redirect()->route('ListAllTopics', [$topic->id])
                ->with('message', 'Atualizado com sucesso!');
    }



}
