@auth
    <markable action='{{ route('like.toggle') }}' method='post' type='post'
    object_id='{{ $post->id }}' true-text='<i class="bi bi-hand-thumbs-up-fill me-1"></i> Liked' false-text='<i class="bi bi-hand-thumbs-up me-1"></i> Like'
    button-style='primary' initial-state='{{ $post->isLikedBy(auth()->user()) }}'
    ></markable>
    <markable action='{{ route('favorite.toggle') }}' method='post' type='post'
    object_id='{{ $post->id }}' true-text='<i class="bi bi-heart-fill me-1"></i> Favorited' false-text='<i class="bi bi-heart me-1"></i> Favorite'
    button-style='danger' initial-state='{{ $post->isFavoritedBy(auth()->user()) }}'
    ></markable>
@endauth
<a href="{{ route('post.show',$post) }}" class="btn btn-success mx-2">
    <i class="bi bi-eye-fill me-1"></i>
    <span>Show</span>
</a>