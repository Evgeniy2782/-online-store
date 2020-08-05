<?php

namespace App\Models\ShopModels;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'item',
        'description',
        'price',
        'picture',
        'category_id',
        
    ];
}
