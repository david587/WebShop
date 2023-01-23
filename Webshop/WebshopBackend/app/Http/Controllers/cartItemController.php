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
        if(cartItem::all()->isEmpty() || $cart_item->user_id = Auth::id() ||  $cart_item->product_id != $product_id){
            $cart_item->save();
        }
        
        // $cart_items = CartItem::where("user_id", Auth::id())->first();

        // if($cart_items && $cart_items->product_id = $product_id) {
        //     $cart_item->quantity->update($cart_items);
        // }
        // $datas = [
        //     "product_id"=>$product_id,
        //     "user_id"=>Auth::id(),
        //     "quantity"=>$cart_item->quantity
        // ];

        // $all=cartItem::all();
        // if($all->isEmpty() || $cart_items->product_id != $product_id){
        //     cartItem::create($datas);
        // }
    }
}
