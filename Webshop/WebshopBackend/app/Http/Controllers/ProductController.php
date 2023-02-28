<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\newLetter;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Product as ProductResources;

class ProductController extends BaseController
{

    public function sortCategories($name)
    {
        $categories_id = Categorie::where("categorie",$name)->first()->id;
        $products = Product::where("categorie_id", $categories_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }

    public function sortBrands($name)
    {
        $brand_id = Brand::where("brand",$name)->first()->id;
        $products = Product::where("brand_id", $brand_id)->get();
        return $this->sendResponse(ProductResources::collection( $products ), "OK");
    }
   
    //product CRUD
    //in request->pagination number, if we not providing request the dafult value will be 10
    // $request->page
    public function index(Request $request)
    {
        $perPage = 10;
        $page = $request->page ?? 1;
        $products = Product::paginate($perPage, ['*'], 'page', $page);
        return $this->sendResponse(ProductResources::collection($products), 'OK');
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
            "inStock"=>"required",
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

        // $validator = Validator::make($input, [
        //     "name"=>"required",
        //     "price"=>"required",
        //     "details"=>"required",
        //     "image"=>"required",
        //     "inStock"=>"required"
        // ]);

        // if($validator->fails())
        // {
        //     return $this->sendError($validator->errors());
        // }

        $input["brand_id"] = Brand::where("brand",$input["brand_id"])->first()->id;
        $input["categorie_id"] = Categorie::where("categorie",$input["categorie_id"])->first()->id;

        $product = Product::find($id);
        $product->update($input);

        return $this->sendResponse(new ProductResources($product), "Product frissitve");
    }

    public function destroy($id)
    {
        Product::destroy($id);

        return $this->sendResponse([],"Product törölve");
    }

    public function search(Request $request)
    {
        $input = $request->name;
        //i have to null the wariable if the input is not coming for brand table
        $brand = Brand::where("brand", $input)->first();
        $brand_id = $brand ? $brand->id : null;
        
        //same happening here
        $categorie = Categorie::where("categorie", $input)->first();
        $categorie_id = $categorie ? $categorie->id : null;
        
        //Sorting products
        $sortedProducts = Product::Where("name","like", "%".$input."%")->
        orwhere("categorie_id",$categorie_id)->
        orwhere("brand_id",$brand_id)
        ->get();
        return $this->sendResponse(ProductResources::collection( $sortedProducts ), "OK");
    }
}
