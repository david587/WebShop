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
    //todo:
    // -admin jog beszurhatósága,
    // -utovalak védése admin jog alapján,
    public function listUsers()
    {
        $users = User::all();
        return $this->sendResponse(FullUserResources::collection( $users ), "OK");
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
            "email"=> "required|email"
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        } 
        else {
            $email = newsLetter::create($input);
            return $this->sendResponse(new NewsLetterResources($email), "Subscribed");
        }
        

    }


}
