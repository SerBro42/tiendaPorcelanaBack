<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function editUser($id, Request $request){
        DB::table('users')->where('id', $id)->update(['name' => $request->name, 'email' => $request->email, 'address' => $request->address]);

    }
}
