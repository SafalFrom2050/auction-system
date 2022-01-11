<?php

namespace App\Services;

use App\Models\Bid;
use App\Models\Category;
use App\Models\Item;
use App\Models\Review;

class ItemService
{

    public function placeBid($price, $item_id): bool
    {
        $highestPrice = Bid::where('item_id', $item_id)->orderBy('price', 'desc')->first()->price;

        if ($price <= $highestPrice) {
            return false;
        }

        $commission = (0.1 * $price);
        $tax_amount = (0.13 * $price);
        $total_price = $price + $commission + $tax_amount;

        Bid::create([
            'price' => $price,
            'item_id' => $item_id,
            'user_id' => auth()->id(),
            'status' => 1,
            'commission' => $commission,
            'tax_amount' => $tax_amount,
            'total_price' => $total_price
        ]);

        return true;
    }

    public function rate($rating, $item_id): bool
    {
        Review::create([
            'rating' => $rating,
            'item_id' => $item_id,
            'user_id' => auth()->id()
        ]);

        return true;
    }

    public function getItemsWithReviewsAndBids($where)
    {
        return Item::where(...$where)->withCount('reviews')->withAvg('reviews', 'rating')->withMax('bids', 'price')->first();
    }

    public function getCategoriesWithIdAndName(): array
    {
        $categoriesCollection = Category::all()->map(function ($category) {
            return [
                $category->id => $category->name
            ];
        });
        $combined = [];
        foreach ($categoriesCollection->toArray() as $item) {
            $combined += $item;
        }
        return $combined;
    }
}
