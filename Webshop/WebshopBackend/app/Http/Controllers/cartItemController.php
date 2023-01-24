<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\cartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class cartItemController extends Controller
{
    public function store($id)
    //when put different item not storeing that, just add plus 1 to the preveous quantity
    {
        $product_id = Product::find($id)->id;
        $cart_item = new CartItem();
        $cart_item->user_id = Auth::id();
        $cart_item->product_id = $product_id;
        $cart_item->quantity += 1;
        //is checking if there is already an existing cart item in the database that has the same user ID and product ID as the current user and product.
        //If there is no such cart item, it will save the new cart item that is being created.
        if(cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->first() == null){
            $cart_item->save();
        }
        else{
            // cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->update(['quantity' => $cart_item->quantity+1]);
            $cart_item = cartItem::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            $cart_item->quantity += 1;
            $cart_item->save();

        }
    }
}
