<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // $product_id = Product::find($id)->id;
        //külön kell választani    
        $order_item = new Order();
        $order_item->user_id = Auth::id();
        $order_item->product_id = $products_id;
        $order_item->shippingAddress = $request->shippingAddress;
        $order_item->paymentMethod = $request->paymentMethod;
        $order_item->save();
    }
}
