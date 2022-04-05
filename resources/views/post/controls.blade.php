@can('update',$post)
    <a href="{{ route('post.edit',$post) }}" class="btn btn-success m-2">Edit</a>
    @if ($post->isArchived())
        <state text='Unarchive' title='Unarchive Post'
            method='patch' action='{{ route('post.update',$post) }}'
            content="Are you sure you want to Unarchive {{ $post->title }}??"
            state = 'published'
            ></state>
    @else
        <state text='Archive' title='Archive Post'
            method='patch' action='{{ route('post.update',$post) }}'
            content="Are you sure you want to Archive {{ $post->title }}??"
            state = 'archived'
            ></state>
    @endif
@endcan
@can('delete',$post)
    <remove text='Delete' title='Deleting Post'
        method='delete' action='{{ route('post.destroy',$post) }}'
        content="Are you sure you want to delete {{ $post->title }}??"
        ></remove>
@endcan