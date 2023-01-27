<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($result,$message)
    {
        $response = [
            "success"=> true,
            "data"=>$result,
            "message"=>$message
        ];

        return response()->json($response,200);
    }

<<<<<<< HEAD
=======
    public function OrderResponse($result,$informations,$users,$message)
    {
        $response = [
            "success"=> true,
            "data"=>$result,
            "informations"=>$informations,
            "user"=>$users,
            "message"=>$message
        ];

        return response()->json($response,200);   
    }

>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
    public function sendError($error, $errorMessage = [], $code=404)
    {
        $response = [
            "success" => false,
            "message" => $error
        ];

        if(!empty($errorMessage)){
            $response["data"] = $errorMessage;
        }
        return response()->json($response,$code);
    }
}
