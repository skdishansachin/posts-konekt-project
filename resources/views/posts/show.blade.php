<x-app-layout>
    <header>
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" width="500" height="225" alt="{{ $post->title }}">
        <h1 class="mt-5">{{ $post->title }}</h1>
        <p>{{ $post->created_at->diffForHumans() }}</p>
        <div class="d-flex">
            <form action="{{ route('posts.destroy', $post) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
            <a role="button" href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary ms-3">Edit</a>
        </div>
    </header>
    <article class="my-5">
        {!! Str::markdown($post->content) !!}
    </article>
    <br />
    <br />
    <br />
</x-app-layout>