<?php

namespace App\Http\Controllers;
use App\Models\ShopModels\Order;
use App\Models\ShopModels\Category;
use App\Models\ShopModels\Address;
use App\Models\ShopModels\Statuses;
use App\Models\ShopModels\Delivery_pay;
use App\Models\ShopModels\Order_product;
use App\Cart;
use App\User;
use App\Http\Requests\shopRequestForm\FormOrderRequest;
use App\Http\Requests\shopRequestForm\ShopOrderEditStatus;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopOrderController extends Controller
{
    public function ordering(){
        $userId = Auth::user()->id;
        $userAndAddress = (new User)->userAndAddress($userId);

        return view('order/ordering', compact('userAndAddress'));
    }

    public function userEdit($dataUser, $userId){
        $user = User::find($userId);
        $user->update($dataUser);
    }

    public function userAddress($dataAddress, $userId){
        $user = User::find($userId);
        $userIdToaddress = Address::where('user_id', $userId)->get();

        if(!empty($userIdToaddress[0]->id)){
            $user->address->update($dataAddress);
        }else{
            $user->address()->create($dataAddress);
        }
    }

    public function createOrdering(FormOrderRequest $request){
        $userId = Auth::user()->id;
        $dataOrder = $request->all();
        ShopOrderController::userEdit($dataOrder, $userId);
        ShopOrderController::userAddress($dataOrder, $userId);

       $optionDeliveryAndPay = Delivery_pay::all();
           
       $cartToUser = (new Cart)->cartToUser($userId);
       
       $summOrder = 0;
       foreach($cartToUser as $item){
       $summOrder += $item->quantity * $item->price;
       }
        return view('order/order-registration', compact('cartToUser', 'summOrder', 'optionDeliveryAndPay'));
    }

    public function deleteCartToUser($userId){
        $cartСlear = Cart::where('user_id', $userId)->delete();
    }

    public function userOrder($cartProduct, $orderUser){
        foreach($cartProduct as $product){ 
            $productArr = (array)$product;
            $orderUser->orderProduct()->create($productArr);
             }
    }

    public function orderUser($dataRequest, $orderUser){

        if($dataRequest['deliveryAndPay'] === '1'){
            $orderUser['paid'] = 'Нет';
            $orderUser['haveToPay'] = 'Да';
            $orderUser['delivery'] = 'Да';
        }

        if($dataRequest['deliveryAndPay'] === '2'){
            $orderUser['paid'] = 'Да';
            $orderUser['haveToPay'] = 'Нет';
            $orderUser['delivery'] = 'Да';
        }

        if($dataRequest['deliveryAndPay'] === '3'){
            $orderUser['paid'] = 'Нет';
            $orderUser['haveToPay'] = 'Да';
            $orderUser['delivery'] = 'Нет';
        }
        return $orderUser;
    }

    public function registrationOrder(Request $request){
        $userId = Auth::user()->id;
        $cartProduct = (new Cart)->cartToUser($userId);
        $dataRequest = $request->all();

        $summOrder = 0;
        foreach($cartProduct as $item){
        $summOrder += $item->quantity * $item->price;
        }

        $orderUser = new Order();
        $orderUser->user_id = $userId;
        $orderUser->summ = $summOrder;

        $orderUser = ShopOrderController::orderUser($dataRequest, $orderUser);

       // dd($order);

       // $orderUser->order;

        /*
        if($dataRequest['deliveryAndPay'] === '1'){
            $orderUser['paid'] = 'Нет';
            $orderUser['haveToPay'] = 'Да';
            $orderUser['delivery'] = 'Да';
            return $orders;
        }

        if($dataRequest['deliveryAndPay'] === '2'){
            $orderUser['paid'] = 'Да';
            $orderUser['haveToPay'] = 'Нет';
            $orderUser['delivery'] = 'Да';
        }

        if($dataRequest['deliveryAndPay'] === '3'){
            $orderUser['paid'] = 'Нет';
            $orderUser['haveToPay'] = 'Да';
            $orderUser['delivery'] = 'Нет';
        }
         */

        $resultOrder = $orderUser->save();

       if($resultOrder){
        ShopOrderController::userOrder($cartProduct, $orderUser);
        ShopOrderController::deleteCartToUser($userId);
        }

        return view('order/order-finish');
    }

    public function orders(){
        $orders = Order::all();
        return view('order/orders-view', compact('orders'));
      }

      public function order($orderId){
        $userId = Auth::user()->id;
        $userRight =  $user = User::find($userId);
        $statuses = Statuses::all();
        $order = (new Order_product)->orderFull($orderId);

       return view('order/order-view', compact('order', 'statuses', 'userRight'));
      }

      public function userOrders($user_id){
        $orders = Order::where('user_id', $user_id)->get();
        return view('order/orders-view', compact('orders'));
      }

      public function editStatusOrder(ShopOrderEditStatus $request, $orderId){
       $dataRequest = $request->all();

       $order = Order::where('id', $orderId);
       $result = $order->update(['status_id'=> $dataRequest['status_id']]);
     
       if($result){
       return redirect()
                ->route('order', $orderId)
                ->with(['success' => 'Успешно сохранено !']);
       }else{
        return back()
            ->withErrors(['msg' => 'Ошибка сохранения'])
            ->withInput();
    }
      }
}
