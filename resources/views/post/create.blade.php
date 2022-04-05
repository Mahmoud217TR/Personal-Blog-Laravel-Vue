@extends('layouts.app')
@section('title','Create a new Post')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col">
                    <h1>Create a new Post</h1>
                </div>
            </div>
            <div class="row">
                <form action="{{ route('post.store') }}" method='post'>
                    @csrf
                    @include('post.form')
                    <div class="col mb-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection