<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

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
        $post->nombre = "stub name";
        $post->descripcion = "stub description";
        $post->cod_prod = "000-000-000";
        $post->id_cat = 1;
        if($post->save())
        {
            return ['status' => true, 'message' => 'Image saved successfully'];
        } else {
            return ['status' => false, 'message' => 'Something went wrong'];
        }
    }
}
