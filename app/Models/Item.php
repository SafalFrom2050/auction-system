<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['additionalDetails', 'category'];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function auction(): BelongsTo
    {
        return $this->belongsTo(Auction::class);
    }

    public function additionalDetails(): HasMany
    {
        return $this->hasMany(AdditionalDetail::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
