<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    public function r()
    {
        return $this->hasMany(Review::class);
    }
}
