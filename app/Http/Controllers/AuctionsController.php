<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Item;
use Illuminate\Http\Request;

class AuctionsController extends Controller
{
    public function index()
    {
        $auctions = Auction::all();
        return view('home', compact('auctions'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Auction $auction)
    {
        $items = Item::where('auction_id', $auction->id)->withCount('reviews')->withAvg('reviews', 'rating')->get();

        return view('auction-details', compact('auction', 'items'));
    }

    public function edit(Auction $auction)
    {
        //
    }

    public function update(Request $request, Auction $auction)
    {
        //
    }

    public function destroy(Auction $auction)
    {
        //
    }
}
