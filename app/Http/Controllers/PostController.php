<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::with('postImages')->orderBy('created_at', 'desc')->get();
        return response()->json(['error' => false, 'data' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            // TODO: use auth then take the $user = Auth::user();
            $user = User::find(1);
            $title = $request->title;
            $body = $request->body;
            $images = $request->images;

            $post = Post::create([
                'title' => $title,
                'body' => $body,
                'user_id' => $user->id,
            ]);
            // store each image
            foreach($images as $image) {
                $imagePath = Storage::disk('uploads')->put($user->email . '/posts/' . $post->id, $image);
                PostImage::create([
                    'post_image_caption' => $title,
                    'post_image_path' => '/uploads/' . $imagePath,
                    'post_id' => $post->id
                ]);
            }
        });
        return response()->json(200);
    }

    /**
     * Display the resources page.
     *
     */
    public function showPostPage()
    {
        return view('posts.index');

    }
}
