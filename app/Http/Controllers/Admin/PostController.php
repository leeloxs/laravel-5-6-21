<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    public function index() {
        $posts = $this->postRepository->all(['user'], ['*'], 10);
        return view('admin.posts.index', compact('posts'));
    }
    public function store(Request $request)
    {
        $response =  $this->postRepository->create($request->all());
        return redirect()->route('admin.posts.index')->with('status', $response->content());
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $response = $this->postRepository->update($request->all(), $post);

        return redirect()->back()->with('status', $response->content());
    }

    public function show(Post $post)
    {
        $post->load(['user', 'images']);

        return view('admin.posts.show', compact('post' ));
    }

    public function destroy(Post $post)
    {
        $response = $this->postRepository->delete($post);

        return redirect()->back()->with('status', $response->content());
    }
}
