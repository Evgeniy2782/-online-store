<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShopModels\Address;
use App\Cart;

class User extends Model
{

    protected $fillable = [

        'name',
        'surname',
        'patronymic',
        'pfone',
        'email',
        'password',
        'active',
        'right',
        'picture',

    ];

    public function cartUser(){
        return $this->hasOne(Cart::class);
    }
    
    public function address(){
        return $this->hasOne(Address::class);
    }

    public function userAndAddress($userId){
        return DB::select('SELECT * FROM users, addresses WHERE users.id = ? and users.id = addresses.user_id', [$userId]);
    }

}