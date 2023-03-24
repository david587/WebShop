<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController as BaseController;

class AuthController extends BaseController
{
    public function signIn(Request $request)
    {
        if(Auth::attempt(["email"=> $request->email,"password"=>$request->password])){
            $authUser = Auth::user();
            $success["token"] = $authUser->createToken("MyAuthApp")->plainTextToken;
            $success["name"] = $authUser->name;
            return $this->sendResponse($success,"Successful login.");
        }
        else{
            return $this->sendError("Wrong credentials!");
        }
    }

    public function signUp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|unique:users",
            "address"=>"required",
            "phone"=>"required",
            "email"=> "required|email|unique:users",
            "password"=> "required",
            "confirm_password"=> "required|same:password",
        ]);
        if($validator->fails()){
            // return $this->sendError("Error validation", $validator->errors() );

            return response() ->json([
                'errors'=>$validator->errors()], 400);
        }

        $input = $request->all();
        $input["password"]= bcrypt($input["password"] );
        $user = User::create($input);
        $success["name"] = $user->name;

        return $this->sendResponse($success, "Succesful register.");
    }

    public function signOut(Request $request)
    {
        auth("sanctum")->user()->currentAccesToken()->delete();
        return response()->json("Successfully logout");
    }
}
