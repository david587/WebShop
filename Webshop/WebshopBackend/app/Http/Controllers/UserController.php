<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Http\Resources\FullUser as FullUserResources;

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


}
