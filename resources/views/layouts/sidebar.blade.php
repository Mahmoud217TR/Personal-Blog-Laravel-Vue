
<aside class="p-4 text-light">
    @include('layouts.nav')
    <hr class="hr-x2">
    <div class="h2 text-md-start text-center mt-2">
        Favorite Posts:
    </div>
    <ol class="unstyled-list">
        @forelse (\App\Models\Post::whereHasFavorite(auth()->user())->get() as $favorite_post)
            <li>
                <p><a class="text-light" href="{{ route('post.show',$favorite_post) }}">{{ $favorite_post->title }}</a></p>
            </li>    
        @empty
            <p>No favorites to show.</p>
        @endforelse
    </ol>
</aside>