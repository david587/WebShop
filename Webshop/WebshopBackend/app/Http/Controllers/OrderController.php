<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Resources\Order as orderResources;

class OrderController extends BaseController
{
    public function store(Request $request)
    {
        //csak egg adatot tölt fel, akkor is ha több rendelése van a kosárban
        $products_id = cartItem::where("user_id",Auth::id())->first()->product_id;
        $cartQuantity = cartItem::where("user_id", Auth::id())->first()->quantity; 

        $order_item = new Order();
        $order_item->user_id = Auth::id();
        $order_item->product_id = $products_id;
        $order_item->quantity = $cartQuantity;
        $order_item->shippingAddress = $request->shippingAddress;
        $order_item->phone = $request->phone;
        $order_item->paymentMethod = $request->paymentMethod;
        $order_item->save();
        return $this->sendResponse([],"Product hozzáadva az Orderhez");
        
    }

    public function showUserItems()
    {
        $userOrder = Order::where("user_id",Auth::id())->get();
        return $this->sendResponse(orderResources::collection( $order_item ), "OK");
    }
}
