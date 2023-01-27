<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        // $user = User::find($id);
        // $user->admin_since = now();
        // $user->update($user->admin_since);
    }


}
