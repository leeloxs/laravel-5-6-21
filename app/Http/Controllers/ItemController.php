<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $items = Item::with('images')->orderBy('created_at', 'desc')->get();
        return response()->json(['error' => false, 'data' => $items]);
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
            $quantity = $request->quantity;
            $images = $request->images;

            $item = Item::create([
                'title' => $title,
                'body' => $body,
                'quantity' => $quantity,
                'user_id' => $user->id,
            ]);
            // store each image
            foreach($images as $image) {
                $imagePath = Storage::disk('uploads')->put($user->email . '/items/' . $item->id, $image);
                Image::create([
                    'caption' => $title,
                    'path' => '/uploads/' . $imagePath,
                    'imageable_id' => $item->id,
                    'imageable_type' => Item::IMAGEABLE_TYPE,
                ]);
            }
        });
        return response()->json(200);
    }

    /**
     * Display the resources page.
     *
     */
    public function showItemPage()
    {
        return view('items.index');

    }
}
