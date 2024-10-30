<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function listAllTags(Request $request) {
        // lógica
        $tags = Tag::all();
        return view('tags.listAllTags', ['tags' => $tags]);
    }

    public function createTag(Request $request) {
        if ($request->method() === 'GET') {

            return view('tags.createTag');

        } else {

            $request->validate([
                'tie' => 'required|string|max:255',
                // 'created_at' => 'date_format:format',
                // 'updated_at' => 'date_format:format'

            ]);


            $tag = Tag::create([
                'tie' => $request->tie,
                // 'created_at' => now(),
                // 'updated_at' => now(),
            ]);

            return redirect()
                    ->route('ListAllTags')
                    ->with('success', 'Tag criada com sucesso.');

        }

    }

    public function updateTag(Request $request, $uid) {
        $tag = Tag::where('id', $uid)->first();
        $tag->tie = $request->tie;


        $tag->save();
        return redirect()->route('ListAllTags', [$tag->id])
                ->with('message', 'Atualizado com sucesso!');
    }

    public function deleteTag(Request $request, $uid) {
        Tag::where('id', $uid)->delete();
        return redirect()->route('ListAllTags')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function listTagById(Request $request, $uid) {
        print($uid);
        $tag = Tag::where('id', $uid)->first();
        return view('tags.listTag', ['tag' => $tag]);

    }
    public function editTag(Request $request,$uid) {
        $tag = Tag::where('id', $uid)->first();
      return view('tags.editTags', ['tag' => $tag]);
    }

}
