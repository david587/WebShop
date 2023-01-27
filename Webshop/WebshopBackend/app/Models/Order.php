<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderInformations;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "quantity",
        "product_id",
        "user_id",
        "order_information_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    
    public function orderInformation()
    {
        return $this->belongsTo(OrderInformations::class);
    }
}
