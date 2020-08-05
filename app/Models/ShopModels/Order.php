<?php

namespace App\Models\ShopModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [

        'name',
        'patronymic',
        'surname',
        'pfone',
        'city',
        'street',
        'house',
        'flat',
        'floor',
        'paid',
        'status',
        'orderId',
        'status_id',
        
    ];

    public function orderProduct(){
        return $this->hasMany(Order_product::class);
    }

}