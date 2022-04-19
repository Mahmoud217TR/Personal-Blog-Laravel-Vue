@auth
    <markable action='{{ route('like.toggle') }}' method='post' type='comment'
    object_id='{{ $comment->id }}' true-text='<i class="bi bi-hand-thumbs-up-fill me-1"></i> Liked' false-text='<i class="bi bi-hand-thumbs-up me-1"></i> Like'
    button-style='primary' initial-state='{{ $comment->isLikedBy(auth()->user()) }}'
    ></markable>
@endauth