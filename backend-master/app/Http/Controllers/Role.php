<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Role extends Controller
{
    public function getRoles()
    {
        $roles = DB::table("roles")
                        ->select("id_rol", "nombre_rol")
                        ->get();
        return response()->json($roles);
    }
}
