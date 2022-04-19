<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maize\Markable\Models\Like;
use Maize\Markable\Models\Favorite;

class MarkableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $TYPES = ['post', 'comment'];

    private function getValidData(){
        return request()->validate([
            'type' => ['required', Rule::in($this->TYPES)],
            'object_id' => 'required|exists:'.request('type').'s,id',
        ]);
    }

    public function toggleLike(){
        $data = $this->getValidData();
        if($data['type'] == 'post'){
            Like::toggle(Post::find($data['object_id']), auth()->user());
            return Like::has(Post::find($data['object_id']), auth()->user());
        }else{
            Like::toggle(Comment::find($data['object_id']), auth()->user());
            return Like::has(Comment::find($data['object_id']), auth()->user());
        }
    }

    public function toggleFavorite(){
        $data = $this->getValidData();
        if($data['type'] == 'post'){
            Favorite::toggle(Post::find($data['object_id']), auth()->user());
            return Favorite::has(Post::find($data['object_id']), auth()->user());
        }else{
            Favorite::toggle(Comment::find($data['object_id']), auth()->user());
            return Favorite::has(Comment::find($data['object_id']), auth()->user());
        }
    }
}
