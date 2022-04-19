@can('delete',$post)
<remove text='Delete' title='Deleting Post' id='remove-post-{{ $post->id }}' hide-button='true'
    method='delete' action='{{ route('post.destroy',$post) }}'
    content="Are you sure you want to delete {{ $post->title }}??"
    ></remove>
@endcan
@can('update',$post)
    @if ($post->isArchived())
    <state text='Unarchive' title='Unarchive Post' id='archive-post-{{ $post->id }}' hide-button='true'
        method='patch' action='{{ route('post.update',$post) }}'
        content="Are you sure you want to Unarchive {{ $post->title }}??"
        state = 'published'
        ></state>
    @else
    <state text='Archive' title='Archive Post' id='archive-post-{{ $post->id }}' hide-button='true'
        method='patch' action='{{ route('post.update',$post) }}'
        content="Are you sure you want to Archive {{ $post->title }}??"
        state = 'archived'
        ></state>
    @endif
@endcan
@can('update', $post)
    <div class="dropdown mx-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="options" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear-fill me-1"></i>
            <span>Options</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="options">
            @can('update',$post)
            <li>
                <a href="{{ route('post.edit',$post) }}" class="dropdown-item">
                    <i class="bi bi-pencil-fill me-2"></i>
                    <span>Edit</span>
                </a>
            </li>
            <li>
                <a onclick="event.preventDefault();document.getElementById('archive-post-{{ $post->id }}').click();" href="#" class="dropdown-item">
                    <i class="bi @if($post->isArchived()) bi-archive-fill @else bi-archive @endif me-2"></i>
                    <span>{{ $post->isArchived()?'Unarchive':'Archive' }}</span>
                </a>
            </li>
            @endcan
            @can('delete',$post)
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a onclick="event.preventDefault();document.getElementById('remove-post-{{ $post->id }}').click();" href="#" class="dropdown-item">
                        <i class="bi bi-trash-fill me-2"></i>
                        <span>Delete</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
@endcan