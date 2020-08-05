<?php

namespace App\Models\ShopModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistics_product extends Model
{
    public function addItem($userId){
        return DB::insert('insert into statistics_products(item_id) values (?)', [$userId]);
    }

    public function fiveMostVisitedProducts(){
        return DB::select('SELECT item_id, quantity, item from statistics_products, products WHERE
         item_id = products.id ORDER BY item_id, quantity, products.item DESC LIMIT 5');
    }

    public function fiveMostUnvisitedProducts(){
        return DB::select('SELECT item_id, quantity, item from statistics_products, products WHERE item_id = products.id ORDER BY quantity, products.item LIMIT 5');
    }

   public function averageCheck(){
        return DB::select('SELECT AVG(summ) FROM orders');
    }
}
