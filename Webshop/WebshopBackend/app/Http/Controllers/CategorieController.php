<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Categorie as CategorieResources;
use App\Models\Categorie;

class CategorieController extends BaseController
{
    public function index()
    {
        $categories = Categorie::all();
        return $this->sendResponse(CategorieResources::collection( $categories ), "OK");

    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "categorie"=>"required"
        ]);
        if($validator->fails())
        {
            return $this->sendError($validator->errors());
        }

        $categories = Categorie::create($input);
        return $this->sendResponse(new CategorieResources($categories), "Categorie létrehozva");
    }

    public function destroy($id)
    {
        Categorie::destroy($id);

        return $this->sendResponse([],"Categorie törölve");
    }
}
