<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private ItemService $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
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
        $category = Category::where('id', $id)->first();
        $items = Item::where('category_id', $category->id)->where('is_approved', true)
            ->withCount('reviews')->withAvg('reviews', 'rating')
            ->withMax('bids', 'price')
            ->get();

        return view('category-details', compact('category', 'items'));
    }

    public function search(SearchRequest $request, Category $category)
    {
        $searchData = $request->validated();
        $unfilteredItems = Item::where('category_id', $category->id)->where('is_approved', true)
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

        return view('category-details', compact('category', 'items', 'searchData'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
