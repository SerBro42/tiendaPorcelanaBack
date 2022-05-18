<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    //The function should be named "getCategories", but I named it "dropDownShow"
    //because it was the first ever functionality where it was used
    public function dropDownShow(Request $request)
    {
        $categorias = DB::table("categorias")
                        ->select("id", "nombre")
                        ->get();
        return response()->json($categorias);
    }
}
