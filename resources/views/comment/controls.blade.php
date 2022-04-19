@can('update',$comment)
    <a href="{{ route('comment.edit',$comment) }}" class="btn btn-success me-2">
        <i class="bi bi-pencil-fill me-2"></i>
        <span>Edit</span>
    </a>
@endcan
@can('delete',$comment)
    <remove text='Delete' title='Deleting Comment'
            method='delete' action='{{ route('comment.destroy',$comment->id) }}'
            content="Are you sure you want to delete {{ $comment->user->name }}'s comment??"
            ></remove>
@endcan