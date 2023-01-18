<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        "redragon",
        "hp",
        "logitech",
        "urage"
    ];

    public function product()
    {
      return $this->hasOne(Product::class);
    }
}
