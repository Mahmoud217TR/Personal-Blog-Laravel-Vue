@extends('layouts.app')
@section('title','Edit {{ $post->title }}')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col">
                    <h1>Edit {{ $post->title }}</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('post.update',$post) }}" method='post'>
                    @csrf
                    @method('PATCH')
                    @include('post.form')
                    <div class="col mb-3">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection