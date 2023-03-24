<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Brand as BrandResources;
use App\Models\Brand;

class BrandController extends BaseController
{
    public function index()
    {
        $brands = Brand::all();
        return $this->sendResponse(BrandResources::collection( $brands ), "OK");

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "brand"=>"required"
        ]);
        if($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $brands = Brand::create($input);
        return $this->sendResponse(new BrandResources($brands), "Brand created.");
    }

    public function destroy($id)
    {
        Brand::destroy($id);

        return $this->sendResponse([],"Brand deleted.");
    }
}
