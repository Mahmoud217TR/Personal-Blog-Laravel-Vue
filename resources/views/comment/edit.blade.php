@extends('layouts.app')
@section('title','Edit Comment')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-1">
            <form action="{{ route('comment.update',$comment) }}" method="post">
                @csrf
                @method('PATCH')
                <label for="content">Edit your Comment:</label>
                @include('comment.form')
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-success mt-2">
                    <i class="bi bi-clipboard-check-fill me-1"></i>
                    <span>Update</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection