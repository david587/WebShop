<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\cartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\OrderInformations;
use App\Http\Resources\Order as orderResources;
use App\Http\Resources\OrderInformation as OrderInformationResources;
use App\Http\Resources\User as UserResources;
use App\Models\OrderInformations as ModelsOrderInformations;
use App\Mail\OrderSubmitted;
use Illuminate\Support\Facades\Mail;


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

            $product = Product::find($cartItem->product_id);
            $product->inStock = $product->inStock - 1;
            $product->save();
            $order_item->quantity = $cartItem->quantity;
            $order_item->order_information_id = $order_Information->id;
            $order_item->save();
        }
        $user = User::where("id",Auth::id())->first();
        $emailAdd = $user->email;
        $this->showUserItems($emailAdd);

        return $this->sendResponse([],"All cart items added to Orders");
    }

    public function showUserItems($emailAdd)
    {
        $userOrder = cartItem::where("user_id",Auth::id())->get();
        $userOrder_id = Order::where("user_id",Auth::id())->first()->id;
        $shippingData = OrderInformations::where("id",$userOrder_id)->get();
        $UserData = User::where("id",Auth::id())->first();
        $user = $UserData->toArray();
        $shipping = $shippingData->toArray();
        $order = $userOrder;

        // Send email
        $email = config('mail.from.address');
        Mail::to($emailAdd)->send(new OrderSubmitted($user,$email,$order,$shipping));
    }
}
