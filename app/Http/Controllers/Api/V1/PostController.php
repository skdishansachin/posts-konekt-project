<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Post\StorePostRequest;
use App\Http\Resources\Api\V1\Post\PostCollection;
use App\Http\Resources\Api\V1\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Post::class);

        $posts = $request->user()->posts();

        if ($request->has('title')) {
            $posts->where('title', 'like', "%$request->title%");
        }

        return new PostCollection($posts->get());
    }

    public function store(StorePostRequest $request)
    {
        Gate::authorize('create', Post::class);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);

        return new PostResource($post);
    }

    public function show(Request $request, Post $post)
    {
        Gate::authorize('view', $post);

        return new PostResource($post);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $path = $request->image->store('images', 'public');
        } else {
            $path = $post->image;
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
        ]);

        return new PostResource($post);
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        Storage::disk('public')->delete($post->image);
        $post->delete();

        return response()->noContent();
    }
}
