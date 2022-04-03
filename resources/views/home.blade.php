@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col px-5">
            @forelse ($posts as $post)
                @include('posts.display',$post)
            @empty
                <div class="display-3">
                    No Posts yet.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
