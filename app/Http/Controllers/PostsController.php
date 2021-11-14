<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\User;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = \Auth::id();
        $post->save();

        return redirect()->route('index');
    }

    public function edit(Post $post,$id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id !== \Auth::id()){
            return redirect()->route('index')
                        ->with('error', '許可されていない操作です');
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        
        if(Auth::id() == $post->user_id)
        {
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();

            return redirect()->route('index'); 
        }
        return redirect()->route('index')->with('error', '許可されていない操作です');
    }

    public function destroy($id) 
    {
        $post = Post::findOrFail($id);

        if(Auth::id() == $post->user_id){
            $post -> delete();

            return redirect()->route('index');
        }
        return redirect()->route('index')->with('error', '許可されていない操作です');
    }
}
