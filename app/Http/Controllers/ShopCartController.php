<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Cart;
use App\Models\ShopModels\Product;
use App\Models\ShopModels\Order;
use App\Models\ShopModels\Statistics_product;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\shopRequestForm\CartRequest;


class ShopCartController extends Controller
{
   
    public function cart(){
      $userId = Auth::id();
      $orderToUser = Order::where('user_id', $userId)->get();

      $cartToUser = (new Cart)->cartToUser($userId);

      return view('basket/cart', compact('cartToUser', 'orderToUser', 'userId'));
 }

    public function addStatistic(Request $request){
     $data = $request->all();
     $result = Statistics_product::where('item_id', $data['item_id'])->get();

     if(empty($result[0]->item_id)){
      (new Statistics_product)->addItem($data['item_id']);
     }else{
       Statistics_product::where('item_id', $data['item_id'])->increment('quantity');
     }
    
    }

    public function addToCart(CartRequest $request){
      $user_id = Auth::id();
      $user = User::find($user_id);
      $cartToUser = Cart::where('user_id', $user_id)->get();
      $data = $request->all();
      $data['user_id'] = $user_id;
      $create = true;

  foreach($cartToUser as $item){
   if ($item->item_id === $data['item_id']){
      $count = $cartToUser[0]->quantity;
      $data['quantity'] = $count + 1;
    //  $user->cartUser()->update($data);
      $create = false;
   break;
    }
  }

   if($create == true)
    $user->cartUser()->create($data);
  }

    public function deleteItem($item_id){
    $user_id = Auth::id();
    $cart = new Cart();
    $result = $cart->itemDelete($user_id, $item_id); 

    return redirect()->route('cart');
    }

}
