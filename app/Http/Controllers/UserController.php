<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $pageConfigs = ['pageHeader' => false];

        $users = User::get();

        return view('user/list', [
            'pageConfigs' => $pageConfigs,
            'users'       => $users
        ]);
    }
}
