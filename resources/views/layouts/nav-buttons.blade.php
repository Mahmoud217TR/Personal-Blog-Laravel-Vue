<li class="nav-item m-2">
    <a class="nav-link rounded btn @if(Route::currentRouteName()== $name) btn-success text-light @else btn-light @endif" href="{{ $href }}">{{ $text }}</a>
</li>