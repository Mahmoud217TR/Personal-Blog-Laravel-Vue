@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col px-5">
            @forelse ($posts as $post)
                @include('post.display',$post)
            @empty
                <div class="display-3">
                    No Posts yet.
                </div>
            @endforelse
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <!-- Previous link -->
            @if($posts->currentPage() > 1)
                <a class="btn btn-primary" href="{{ $posts->previousPageUrl() }}">Previous</a>
            @else
                <a class="btn btn-secondary disabled-btn" href="#">Previous</a>
            @endif

            <!-- Current Page Number -->
            <div class="d-flex align-items-center">
                <span class="badge bg-primary rounded-pill mx-2"> {{ $posts->currentPage() }} </span>
            </div>

            <!-- Next link -->
            @if($posts->hasMorePages())
                <a class="btn btn-primary" href="{{ $posts->nextPageUrl() }}">Next</a>
            @else
                <a class="btn btn-secondary disabled-btn" href="#">Next</a>
            @endif
        </div>
    </div>
</div>
@endsection
