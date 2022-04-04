<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        $post->with('comments','comments.users','user');
        return view('posts.show',compact('post'));
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return route('home');
    }
}
