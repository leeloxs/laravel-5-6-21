<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends BaseController
{
    public function index() {
        $items = $this->itemRepository->all(['user', 'images'], ['*'], 10);

        return view('admin.items.index', compact('items'));
    }
    public function store(Request $request)
    {
        $response =  $this->itemRepository->create($request->all());
        return redirect()->route('admin.items.index')->with('status', $response->content());
    }

    public function edit(Item $item)
    {
        $item->load(['user', 'images']);

        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $response = $this->itemRepository->update($request->all(), $item);

        return redirect()->back()->with('status', $response->content());
    }

    public function show(Item $item)
    {
        $item->load(['user', 'images']);

        return view('admin.items.show', compact('item' ));
    }

    public function destroy(Item $item)
    {
        $response = $this->itemRepository->delete($item);

        return redirect()->back()->with('status', $response->content());
    }
}
