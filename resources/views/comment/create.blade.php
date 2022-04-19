<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden required>
    <label for="content">Add a Comment:</label>
    @include('comment.form')
    @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <button class="btn btn-primary mt-2">
        <i class="bi bi-chat-fill me-1"></i>
        <span>Comment</span>
    </button>
</form>