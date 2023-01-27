<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Models\OrderInformations;
use App\Http\Resources\Order as orderResources;
use App\Models\OrderInformations as ModelsOrderInformations;

class OrderController extends BaseController
{
    public function store(Request $request)
    {
        $order_Information = new ModelsOrderInformations();
        $order_Information->shippingAddress =$request->shippingAddress;
        $order_Information->phone = $request->phone;
        $order_Information->paymentMethod = $request->paymentMethod;
        $order_Information->save();

        $allSorted = cartItem::where("user_id",Auth::id())->get();
        foreach($allSorted as $cartItem) {
            $order_item = new Order();
            $order_item->user_id = Auth::id();
            $order_item->product_id = $cartItem->product_id;
            $order_item->quantity = $cartItem->quantity;
            $order_item->order_information_id = $order_Information->id;
            $order_item->save();
        }
        return $this->sendResponse([],"All cart items added to Orders");
    }

    public function showUserItems()
    {
        $userOrder = Order::where("user_id",Auth::id())->get();
        return $this->sendResponse(orderResources::collection( $userOrder ), "OK");
    }
}
