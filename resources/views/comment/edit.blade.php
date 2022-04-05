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
                <textarea class='form-control' name="content" id="content" cols="30" rows="4" required>{{ $comment->content??old('content') }}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection