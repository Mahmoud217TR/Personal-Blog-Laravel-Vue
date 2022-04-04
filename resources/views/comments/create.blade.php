<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden>
    <label for="content">Add a Comment:</label>
    <textarea class='form-control' name="content" id="content" cols="30" rows="4">{{ old('content') }}</textarea>
    <button class="btn btn-primary mt-2">Comment</button>
</form>