<?php

namespace App\Models\ShopModels;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{

    protected $fillable = [

        'order_id',
        'item_id',
        'quantity',
        'summ',
        'user_id',

    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function orderFull($orderId){
        return DB::select('SELECT * FROM order_products, products, orders, users, addresses WHERE order_products.order_id = ? and order_products.item_id = products.id and
        order_products.order_id = orders.id and users.id = order_products.user_id and addresses.user_id = users.id; ', [$orderId]);
    }
}
