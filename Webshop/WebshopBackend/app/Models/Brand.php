<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        "brand",
    ];
    public $timestamps = false;

    public function product()
    {
      return $this->hasMany(Product::class);
    }
}
