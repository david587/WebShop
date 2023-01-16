<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        "Redragon",
        "Hp",
        "Logitech",
        "Urage"
    ];

    public function product()
    {
      return $this->hasOne(Product::class);
    }
}
