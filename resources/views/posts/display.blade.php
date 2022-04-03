
<div class="card mb-3">
    <div class="card-body">
        <div class="container p-2">
            <div class="row">
                <div class="col-lg-1 col-md-2 col-sm-3 col-4 d-flex align-items-center">
                    <img src="https://via.placeholder.com/50" class="rounded-circle" alt="author">
                </div>
                <div class="col p-0 d-flex align-items-center">
                    <p class="mb-0 px-2 h3">{{ $post->user->name }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <h2 class="h2">{{ $post->title }}</h2>
                <p class="truncate-5-lines">
                    {{ $post->content }}
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <a href="#" class="btn btn-primary mx-2">View</a>
                @can('update',$post)
                    <a href="#" class="btn btn-success mx-2">Edit</a>
                @endcan
                @can('delete',$post)
                    <a href="#" class="btn btn-danger mx-2">Delete</a>
                @endcan
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        {{ $post->created_at }}
      </div>
</div>