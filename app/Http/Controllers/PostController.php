<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', Post::class);

        return view('posts.index', [
            'posts' => $request->user()->posts()->get(),
        ]);
    }

    public function create(): View
    {
        Gate::authorize('create', Post::class);

        return view('posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        Gate::authorize('create', Post::class);

        $path = $request->image->store('images', 'public');

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
        ]);

        return redirect()->route('posts.index');
    }

    public function show(Post $post): View
    {
        Gate::authorize('view', $post);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
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

        return redirect(route('posts.show', $post));
    }

    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        Storage::disk('public')->delete($post->image);
        $post->delete();

        return redirect(route('posts.index'));
    }
}
