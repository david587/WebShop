<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInformations extends Model

{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        "shippingAddress",
        "phone",
        "paymentMethod",
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
