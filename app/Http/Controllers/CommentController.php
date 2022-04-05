<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    private function getValidated(){
        return request()->validate([
            'content' => 'required|string',
            'post_id' => 'required|exists:posts,id',
        ]);
    }

    public function store(){
        $this->authorize('create',Comment::class);
        $data = $this->getValidated();
        $this->authorize('view',Post::find($data['post_id']));
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $data['post_id'],
            'content' => $data['content'],
        ]);
        
        return redirect()->route('post.show',$data['post_id']);
    }

    public function edit(Comment $comment){
        $this->authorize('update',$comment);
        return view('comment.edit',compact('comment'));
    }

    public function update(Comment $comment){
        $this->authorize('update',$comment);
        $data = request()->validate([
            'content' => 'required|string',
        ]);
        $comment->update($data);
        return redirect()->route('post.show',$comment->post_id);
    }

    public function destroy(Comment $comment){
        $redirect = route('post.show',$comment->post->id);
        $this->authorize('delete',$comment);
        $comment->delete();
        return $redirect;
    }
}
