@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<div class="row mx-2 mt-5">
    <div class="col-lg my-lg-0 my-2">
        <div class="bg-warning text-dark rounded stat d-flex justify-content-center align-items-center">
            <div class="d-block">
                <div class="row">
                    <div class="col">
                        <p class="h3 m-0">Users Count</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-dark m-0 text-center">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg my-lg-0 my-2">
        <div class="bg-danger text-light rounded stat d-flex justify-content-center align-items-center">
            <div class="d-block">
                <div class="row">
                    <div class="col">
                        <p class="h3 m-0">Posts Count</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-light m-0 text-center">{{ $postsCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg my-lg-0 my-2">
        <div class="bg-info text-dark rounded stat d-flex justify-content-center align-items-center">
            <div class="d-block">
                <div class="row">
                    <div class="col">
                        <p class="h3 m-0">Comments Count</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-dark m-0 text-center">{{ $commentsCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mx-2 mt-4">
    <div class="col-lg my-2">
        <a href="{{ route('post.create') }}" class="btn btn-primary d-block my-2">Create a new Post</a>
        <a href="{{ route('all') }}" class="btn btn-success d-block my-2">Show all Posts</a>
        <a href="{{ route('draft') }}" class="btn btn-warning d-block my-2">Show Draft Posts</a>
        <a href="{{ route('archived') }}" class="btn btn-secondary d-block my-2">Show Archived Posts</a>
    </div>
    <div class="col-lg my-2">
        <p class="h4">Most Popular Posts</p>
        <ol class="list-group list-group-numbered">
            @forelse ($popularposts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <a class="ms-2 me-auto unstyled-link" href="{{ route('post.show',$post->id) }}">
                        <div class="fw-bold">{{ $post->title }}</div>
                    </a>
                    <span class="badge bg-danger rounded-pill">{{ $post->comments_count }}</span>
                </li>
            @empty
                <p class="h5">No Posts yet</p>
            @endforelse
        </ol>
    </div>
    <div class="col-lg my-2">
        <p class="h4">Most Recent Posts</p>
        <ol class="list-group list-group-numbered">
            @forelse ($recentPosts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <a class="ms-2 me-auto unstyled-link" href="{{ route('post.show',$post->id) }}">
                        <div class="fw-bold">{{ $post->title }}</div>
                    </a>
                </li>
            @empty
                <p class="h5">No Posts yet</p>
            @endforelse
        </ol>
    </div>
</div>
@endsection