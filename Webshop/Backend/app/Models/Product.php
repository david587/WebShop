<?php

namespace App\Models;
use app\Models\Brand;
use app\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Order;
use app\Models\cartItem;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "details",
        "image",
        "brand_id",
        "categorie_id"
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function cartItem(){
        return $this->hasMany(cartItem::class);
    }
}
