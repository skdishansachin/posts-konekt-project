<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('posts.update', $post) }}"  method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" />
        @error('title')
            <div>{{ $message }}</div>
        @enderror
        <textarea name="content" id="content" cols="30" rows="10">
            {{ old('content', $post->content) }}
        </textarea>
        @error('content')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Create Post</button>
    </form>
</body>
</html>