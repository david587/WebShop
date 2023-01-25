<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class orderInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        "shippingAddress",
        "phone",
        "paymentMethod",
        "order_id"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
