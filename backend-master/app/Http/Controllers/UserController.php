<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsers() 
    {
        $users = DB::table("users")
        ->select("name", "email", "address", "id_role", "created_at")
        ->get();
        return response()->json($users);
    }

    public function editUser($id, Request $request)
    {
        DB::table('users')->where('id', $id)->update(['name' => $request->name, 'email' => $request->email, 'address' => $request->address]);
    }
}
