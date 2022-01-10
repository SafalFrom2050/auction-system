<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $item = Item::where('id', $id)->withCount('reviews')->withAvg('reviews', 'rating')->withMax('bids', 'price')->first();

        $similarItems = Item::where('category_id', $item->category_id)->limit(5)->get();

        return view('item-details', compact('item', 'similarItems'));
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(Request $request, Item $item)
    {
        //
    }

    public function destroy(Item $item)
    {
        //
    }
}
