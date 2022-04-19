<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except('show');
    }

    private function getValidatedData(){
        return request()->validate([
            'title' => 'sometimes|string|max:100',
            'content' => 'sometimes|string',
            'state' => ['sometimes','string',Rule::in(Post::states())],
        ]);
    }

    public function show(Post $post){
        $post->with('comments','comments.users','user','likers');
        return view('post.show',compact('post'));
    }

    public function create(){
        $this->authorize('create',Post::class);
        $post = new Post;
        $states = Post::states();
        return view('post.create',compact('post','states'));
    }

    public function store(){
        $this->authorize('create',Post::class);
        $data = $this->getValidatedData();
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => auth()->id(),
            'state' => $data['state'],
        ]);

        return redirect()->route('post.show',$post);
    }

    public function edit(Post $post){
        $post->with('user');
        $this->authorize('update',$post);
        $states = Post::states();
        return view('post.edit',compact('post','states'));
    }

    public function update(Post $post){
        $this->authorize('update',$post);
        $post->update($this->getValidatedData());
        if(request()->has('api')){
            return route('post.show',$post);
        }
        return redirect()->route('post.show',$post);
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return route('home');
    }
}
