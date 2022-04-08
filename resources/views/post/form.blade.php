<div class="col mb-3">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" for='title' name='title' required value='{{ $post->title??old('title') }}'>
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col mb-3">
    <label for="content">Content</label>
    <textarea class='form-control' name="content" id="content" cols="30" rows="10" required>{{ $post->content??old('content') }}</textarea>
    @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col mb-3">
    <label for="state">State</label>
    <select class='form-select' name="state" id="state" required>
        @foreach ($states as $state)
            <option value="{{ $state }}">{{ Str::title($state) }}</option>
        @endforeach
    </select>
    @error('state')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>