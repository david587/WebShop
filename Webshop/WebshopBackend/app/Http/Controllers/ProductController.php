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
    //sort categories
    public function sortKeyboards()
    {
        $keyboard_id = Categorie::where("categorie","Keyboard")->first()->id;
        $products = Product::where("categorie_id",$keyboard_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortMouses()
    {
        $mouse_id = Categorie::where("categorie","Mouse")->first()->id;
        $products = Product::where("categorie_id",$mouse_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
        
    }

    public function sortHeadsets()
    {
        $headset_id = Categorie::where("categorie","Headset")->first()->id;
        $products = Product::where("categorie_id",$headset_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortMonitors()
    {
        $monitor_id = Categorie::where("categorie","Monitor")->first()->id;
        $products = Product::where("categorie_id",$monitor_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    //sort brands
    public function sortLogitech()
    {
        $logitech_id = Brand::where("brand","Logitech")->first()->id;
        $products = Product::where("brand_id",$logitech_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortHp()
    {
        $hp_id = Brand::where("brand","Hp")->first()->id;
        $products = Product::where("brand_id",$hp_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortUrage()
    {
        $urage_id = Brand::where("brand","Urage")->first()->id;
        $products = Product::where("brand_id",$urage_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortRedragon()
    {
        $redragon_id = Brand::where("brand","Redragon")->first()->id;
        $products = Product::where("brand_id",$redragon_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    //product CRUD
    public function index()
    {
        $products = Product::all();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function home()
    {
        $products = Product::all();
        if ($products->count() < 4) {
            return $this->sendResponse([], "There are less than 4items");
        }
        
        $randomProducts = $products->random(4);
        if($randomProducts)
        return $this->sendResponse(ProductResources::collection($randomProducts), "Ok");

    }

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
