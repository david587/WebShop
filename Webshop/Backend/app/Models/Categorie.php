<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
      "keyboard",
      "mouse",
      "headset",
      "monitor"
    ];

    public function product()
    {
      return $this->hasOne(Product::class);
    }

   
}
