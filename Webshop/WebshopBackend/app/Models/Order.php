<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use app\Models\User;
use app\Models\Product;
use app\Models\orderInfo;
=======
use App\Models\User;
use App\Models\Product;
use App\Models\OrderInformations;
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "quantity",
        "product_id",
        "user_id",
<<<<<<< HEAD
        "orderInfo_id"
=======
        "order_information_id"
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    
<<<<<<< HEAD

    public function orderInfo()
    {
        return $this->belongsTo(orderInfo::class);
=======
    public function orderInformation()
    {
        return $this->belongsTo(OrderInformations::class);
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
    }
}
