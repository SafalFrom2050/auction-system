<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    protected $casts = [
        'end_date' => 'datetime',
        'date_time' => 'datetime'
    ];
}
