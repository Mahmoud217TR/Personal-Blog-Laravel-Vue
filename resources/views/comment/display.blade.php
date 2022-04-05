<div class="row">
    <div class="col-10 offset-1 mt-4">
        <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-4 d-flex align-items-center">
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="author">
            </div>
            <div class="col p-0 d-flex align-items-center">
                <p class="mb-0 px-2 h3">{{ $comment->user->name }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <p class="text-muted">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                @include('comment.controls')
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <p class="text-muted mb-0 mt-1">
                    <small>Posted at: {{ $comment->created_at }}</small>
                    <br>
                    @if ($comment->isModified())
                        <small>Last Modified at: {{ $comment->updated_at }}</small>
                    @endif
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <hr>
            </div>
        </div>
    </div>
</div>