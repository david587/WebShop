<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Product as ProductResources;
use App\Models\Categorie;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function store(Request $request)
    {
        // if( $validator->fails()){
        //     return $this->sendError( $validator->errors());
        // }

        // $product = Product::create($input);
        // return $this->sendResponse(new ProductResources($product), "Post Létrejött");
    }
}
