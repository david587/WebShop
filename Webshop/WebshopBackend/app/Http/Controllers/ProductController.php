<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Product as ProductResources;
use App\Models\Brand;
use App\Models\Categorie;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    // //sort keyboard
    // public function sortProduct()
    // {
    //     $products = Product::where("brand_id",4)->get();
    //     return $this->sendResponse(ProductResources::collection( $products ), "OK");
    // }

    public function store(Request $request)
    {
        $input = $request->all();
        $input["brand_id"] = Brand::where("brand",$input["brand_id"])->first()->id;
        $input["categorie_id"] = Categorie::where("categorie",$input["categorie_id"])->first()->id;
        $validator = Validator::make($input, [
            "name"=>"required",
            "price"=>"required",
            "details"=>"required",
            "image"=>"required",
            "brand_id"=>"required",
            "categorie_id"=>"required"
        ]);
        if( $validator->fails()){
            return $this->sendError( $validator->errors());
        }

        $product = Product::create($input);
        return $this->sendResponse(new ProductResources($product), "Product Létrehozva");
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(is_null($product))
        {
            return $this->sendError("Product nem létezik");
        }

        return $this->sendResponse(New ProductResources($product), "Ok");
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            "name"=>"required",
            "price"=>"required",
            "details"=>"required",
            "image"=>"required",
        ]);

        if($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $product = Product::find($id);
        $product->update($request->all());

        return $this->sendResponse(new ProductResources($product), "Product frissitve");
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return $this->sendResponse([],"Product törölve");
    }
}
