<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Product;
use app\Models\orderInfo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "quantity",
        "product_id",
        "user_id",
        "orderInfo_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    

    public function orderInfo()
    {
        return $this->belongsTo(orderInfo::class);
    }
}
