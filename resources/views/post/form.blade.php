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
    <editor input-id='content' input-name='content' data='{{ $post->content??old('content') }}'></editor>
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
            <option @selected($state == ($post->state??old('state'))) value="{{ $state }}">{{ Str::title($state) }}</option>
        @endforeach
    </select>
    @error('state')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>