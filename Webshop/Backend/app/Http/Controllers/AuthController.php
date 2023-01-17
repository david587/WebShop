<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function signIn(Request $request)
    {
        if(Auth::attempt(["email"=>$request->email,
                          "password"=>$request->password])){
            $authUser = Auth::user();
            $success["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $success["name"] = $authUser->name;

            return $this->sendResponse($success,"Sikeres bejelentkezés");
        }
        else{
            return $this->sendError("Unathorized.".["error"=> "Hibás adatok" ]);
        }
    }

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "address"=>"required",
            "phone"=>"required",
            "email"=> "required",
            "password"=> "required",
            "confirm_password"=> "required|same:password",
        ]);
        if($validator->fails()){
            return $this->sendError("Error validation", $validator->errors() );
        }

        $input = $request->all();
        $input["password"]= bcrypt($input["password"] );
        $user = User::create($input);
        $success["name"] = $user->name;

        return $this->sendResponse($success, "Sikeres regisztráció");
    }
}
