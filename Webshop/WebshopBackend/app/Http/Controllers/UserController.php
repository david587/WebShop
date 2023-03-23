<?php

namespace App\Http\Controllers;

use App\Models\User;    
use App\Models\newsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FullUser as FullUserResources;
use App\Http\Resources\newsLetter as NewsLetterResources;

class UserController extends BaseController
{
    public function listUsers()
    {
        $users = User::all();
        return $this->sendResponse(FullUserResources::collection( $users ), "OK");
    }

    public function deleteUsers($id)
    {
        $user= User::destroy($id);
        return $this->sendResponse([],"User törölve");
    }

    public function AdminAccess($id)
    {
        $user = User::find($id);
        //  $user = User::where("id",Auth::id())->update(["admin_since"=>now()]);
        $user->admin_since = now();
        $user->save();
        return $this->sendResponse(new FullUserResources( $user ), "Admin access gived");

    }

    public function newsLetter(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            //todo:
            //implement unique parameter there
            "email"=> "required|email|unique:news_letters"
        ]);

        if ($validator->fails()) {
            return response() ->json([
                'errors'=>$validator->errors()], 400);
        } 
        else {
            $email = newsLetter::create($input);
            return $this->sendResponse(new NewsLetterResources($email), "Subscribed");
        }
        

    }


}
