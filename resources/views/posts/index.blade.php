<x-app-layout>
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid bd-placeholder-img card-img-top" width="100%" height="225" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h5>
                        <p class="card-text">{{ Str::limit($post->content, 200) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a role="button" href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                <a role="button" href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            </div>
                            <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>