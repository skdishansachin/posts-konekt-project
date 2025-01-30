<x-app-layout>
    <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" />
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" />
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">
            {{ old('content', $post->content) }}
            </textarea>
            @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-flex">
            <button type="submit" class="btn btn-primary">Edit</button>
            <a role="button" href="{{ route('posts.show', $post) }}" class="btn btn-secondary ms-3">Cancle</a>
        </div>
    </form>
</x-app-layout>