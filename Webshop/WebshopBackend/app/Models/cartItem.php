<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use app\Models\Product;


class CartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        "productName",
        "image",
        "quantity",
        "totalCost",
        "product_id",
        "user_id"
      ];
  
      public function user()
      {
        return $this->belongsTo(User::class, "id");
      }
  
      public function product(){
        return $this->belongsTo(Product::class);
    }
}
