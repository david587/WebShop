<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Product;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "shippingAddress",
        "paymentMethod",
        "product_id",
        "user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
