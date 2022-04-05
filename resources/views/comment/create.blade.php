<form action="{{ route('comment.store') }}" method="post">
    @csrf
    <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden required>
    <label for="content">Add a Comment:</label>
    <textarea class='form-control' name="content" id="content" cols="30" rows="4" required>{{ old('content') }}</textarea>
    @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <button class="btn btn-primary mt-2">Comment</button>
</form>