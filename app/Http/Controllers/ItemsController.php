<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Http\Requests\RateRequest;
use App\Models\Item;
use App\Models\Review;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ItemsController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $userService)
    {
        $this->itemService = $userService;
    }
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
        $item = $this->itemService->getItemsWithReviewsAndBids(['id', $id]);

        $similarItems = Item::where('category_id', $item->category_id)->withCount('reviews')->withAvg('reviews', 'rating')->limit(5)->get();

        $canRate = (auth()->id() && Review::where('user_id', auth()->id())->where('item_id', $id)->get()->count() === 0);

        $canBid = (auth()->id());

        return view('item-details', compact('item', 'similarItems', 'canRate', 'canBid'));
    }

    public function bid(BidRequest $request, $id)
    {
        $price = (int) $request->validated()['price'];

        if($this->itemService->placeBid($price, $id)) {
            return back()->with('success', 'You have successfully placed a bid on this item!');
        }

        throw ValidationException::withMessages(['price' => ['The bid price must be higher than the highest bid!']]);
    }

    public function rate(RateRequest $request, $id)
    {
        $this->itemService->rate($request->validated()['rating'], $id);
        return back()->with('success', 'Thank you for your review!');
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
