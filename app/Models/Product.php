<?php

namespace App\Models;
use App\Models\Review;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'description', 'price','stock','discount'
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
