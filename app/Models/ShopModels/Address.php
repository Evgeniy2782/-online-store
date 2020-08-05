<?php

namespace App\Models\ShopModels;

use Illuminate\Database\Eloquent\Model;
use App\Models\ShopModels\User;

class Address extends Model
{
    protected $fillable = [

        'city',
        'street',
        'house',
        'flat',
        'floor',
        'user_id',
        
    ];

    public function user(){
         return $this->belongsToMany(User::class);
     }
}