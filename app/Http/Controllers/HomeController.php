<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::Published()->orderBy('created_at','desc')->with('user')->paginate(8);
        return view('home',compact('posts'));
    }

    public function all()
    {
        $posts = Post::orderBy('created_at','desc')->with('user')->paginate(8);
        return view('home',compact('posts'));
    }

    public function archived()
    {
        $posts = Post::Archived()->orderBy('created_at','desc')->with('user')->paginate(8);
        return view('home',compact('posts'));
    }

    public function draft()
    {
        $posts = Post::Draft()->orderBy('created_at','desc')->with('user')->paginate(8);
        return view('home',compact('posts'));
    }
}
