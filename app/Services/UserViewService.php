<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserViewService
{
    public function getUsersList()
    {
        $users = DB::table('users')->paginate(10);

        return view('welcome');
    }
}

