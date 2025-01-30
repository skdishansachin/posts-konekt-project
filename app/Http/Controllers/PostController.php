<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        return view('posts.index', [
            'posts' => $request->user()->posts()->get(),
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    public function show(Request $request, Post $post): View
    {
        // TODO: Add authorization check

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit(Request $request, Post $post): View
    {
        // TODO: Add authorization check

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        // TODO: Add authorization check

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect(route('posts.show', $post));
    }
}
