<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
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
}
