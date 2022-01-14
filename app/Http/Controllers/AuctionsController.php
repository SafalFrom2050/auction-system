<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Auction;
use App\Models\Category;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class AuctionsController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $auctions = Auction::where('status', 'open')->get();
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
        $items = Item::where('auction_id', $auction->id)->where('is_approved', true)
            ->withCount('reviews')->withAvg('reviews', 'rating')
            ->withMax('bids', 'price')->get();

        $categories = $this->itemService->getCategoriesWithIdAndName();
        return view('auction-details', compact('auction', 'items', 'categories'));
    }

    public function search(SearchRequest $request, Auction $auction)
    {
        $searchData = $request->validated();
        $unfilteredItems = Item::where('auction_id', $auction->id)->where('is_approved', true)
            ->where('title', 'like', '%' . $searchData['query'] . '%' )
//            ->whereIn('category_id', $searchData['categories'])
            ->withCount('reviews')->withAvg('reviews', 'rating')
            ->withMax('bids', 'price')
            ->get();

        $items = $unfilteredItems->filter(function ($item) use($searchData) {
            $noError = true;
            if (isset($searchData['rating'])) {
                $noError = ($item->reviews_avg_rating >= $searchData['rating']);
            }
            if (isset($searchData['price_range_min'])) {
                $noError = $noError && $item->bids_max_price >= $searchData['price_range_min'];
            }
            if (isset($searchData['price_range_max'])) {
                $noError = $noError && $item->bids_max_price <= $searchData['price_range_max'];
            }

            return $noError && $item->est_price <= $searchData['price_range_max'];
        })->values();

        $categories = $this->itemService->getCategoriesWithIdAndName();
        return view('auction-details', compact('auction', 'items', 'searchData', 'categories'));
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
