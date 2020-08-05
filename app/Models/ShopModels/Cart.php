<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\ShopModels\User;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable = [

        'user_id',
        'item_id',

    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function itemDelete($user_id, $item_id){
        $cartToUser = DB::select('DELETE FROM carts WHERE user_id = ? and item_id = ?' , [$user_id, $item_id]);
        return $cartToUser;
    }

    public function cartToUser($userId){
        return DB::select('SELECT * FROM carts, users, products WHERE carts.user_id = ? and carts.user_id = users.id and carts.item_id = products.id;', [$userId]);
    }

}
