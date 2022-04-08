<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $usersCount = User::count();
        $popularposts = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(5)->get();
        $recentPosts = Post::orderBy('created_at','desc')->take(5)->get();
        return view('dashboard',compact('postsCount','commentsCount','usersCount','popularposts','recentPosts'));
    }
}
