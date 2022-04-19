
<div class="card mb-3">
    <div class="card-body">
        <div class="container p-2">
            <div class="row">
                <div class="col-lg-1 col-md-2 col-sm-3 col-4 d-flex align-items-center">
                    <img src="{{ $post->user->image??asset('images/profile_placehloder.jpg') }}" width="50" height="50" class="rounded-circle" alt="author">
                </div>
                <div class="col p-0 d-flex align-items-center">
                    <p class="mb-0 px-2 h3">{{ $post->user->name }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="h2">{{ $post->title }}</h2>
                <p class="truncate-5-lines">
                    {!! $post->content !!}
                </p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-8 col-6 d-flex justify-content-start-center ps-md-0">
                @include('post.interactions')
                @include('post.controls')
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <p class="text-end text-muted my-0 ms-2">
                    {{ $post->likers->count() }} @choice('Like|Likes',$post->likers->count())
                </p>
                <p class="text-end text-muted my-0 ms-2">
                    {{ $post->created_at }}
                </p>
            </div>
        </div>
    </div>
</div>