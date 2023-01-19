<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Product;


class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
       "categorie"
      ];
      public $timestamps = false;
      
      public function product()
      {
        return $this->hasMany(Product::class);
      }
}
