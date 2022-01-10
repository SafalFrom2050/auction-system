<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalDetail extends Model
{
    protected $with = 'categorySpecificDetail';

    public function categorySpecificDetail()
    {
        return $this->belongsTo(CategorySpecificDetail::class);
    }
}
