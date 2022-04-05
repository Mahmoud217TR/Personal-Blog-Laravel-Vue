@extends('layouts.app')
@section('title',$post->title)

@section('content')
<div class="container p-4">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-4 col-5 d-flex align-items-center justify-content-end">
            <img src="https://via.placeholder.com/75" class="rounded-circle" alt="author">
        </div>
        <div class="col p-0 d-flex align-items-center">
            <p class="mb-0 px-2 h1">{{ $post->user->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 pt-4">
            <h1 class="mb-0">
                {{ $post->title }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 pt-4">
            <p class="d-block mb-0">
                {{ $post->content }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 pt-4">
            @include('post.controls')
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1 pt-4">
            <p class="text-muted mb-0">
                <small>Posted at: {{ $post->created_at }}</small>
                <br>
                @if ($post->isModified())
                    <small>Last Modified at: {{ $post->updated_at }}</small>
                @endif
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-10 offset-1">
            @auth
                @include('comment.create')
            @else
                <p><a href="{{ route('login','test') }}">Login</a> to comment on this post.</p>
            @endauth
        </div>
    </div>
    @forelse ($post->comments as $comment)
        @include('comment.display',$comment)
    @empty
        <div class="display-5 text-center mt-2">
            No Comments yet.
        </div>
    @endforelse
</div>
@endsection