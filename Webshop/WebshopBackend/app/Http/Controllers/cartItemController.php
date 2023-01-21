<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;

class cartItemController extends Controller
{
    public function store($id)
    {
        $product_id = Product::find($id)->id;
        $cartItem = new cartItem();
        $cartItem->product_id = $product_id;
        // if($cartItem->user_id = $cartItem->user_id ){
        // }
        $input= [
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'user_id' => 0 // assuming that you want to add user_id too.
        ];
        cartItem::create($input);
        
    }
}
