@can('update',$post)
    <a href="#" class="btn btn-success me-2">Edit</a>
@endcan
@can('delete',$post)
    <remove text='Delete' title='Deleting Post'
        method='delete' action='{{ route('post.destroy',$post) }}'
        content="Are you sure you want to delete {{ $post->title }}??"
        ></remove>
@endcan