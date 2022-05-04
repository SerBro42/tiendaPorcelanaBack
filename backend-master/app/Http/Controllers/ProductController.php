<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product(Request $request) {
        $post = new Producto;
        if($request->hasFile('image')) {
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'.rand() . '_'.time(). '.'.$extension;
            $path = $request->file('image')->storeAs('public/images', $compPic);
            $post->imagen = $compPic;
        }
        $post->nombre = $request->prod_name;
        $post->descripcion = $request->prod_desc;
        $post->cod_prod = $request->cod_prod;
        $post->id_cat = $request->id_cat;
        if($post->save())
        {
            return ['status' => true, 'message' => 'Image saved successfully'];
        } else {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }

    public function showProducts(Request $request)
    {
        $productos = DB::table("productos")
                        ->select("id", "nombre", "descripcion", "cod_prod", "id_cat", "imagen")
                        ->get();
        return response()->json($productos);
    }
}
