<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Session;

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
        $post->precio = $request->precio;
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
                        ->select("id", "nombre", "descripcion", "cod_prod", "id_cat", "precio", "imagen")
                        ->get();
        return response()->json($productos);
    }

    public function getProduct($id)
    {
        $producto = DB::table("productos")->find($id);
        return response()->json($producto);

    }

    public function deleteProduct($id)
    {
        DB::delete('DELETE FROM productos WHERE id = ?', [$id]);
    }

    // public function getAddToCart(Request $request, $id)
    // {
    //     $producto = Producto::find($id);
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($producto, $producto->id);

    //     $request->session()->put('cart', $cart);
    //     //dd($request->session()->get('cart'));
    //     //return redirect()->route('product.index');
    //     return response()->json($producto);
    //     return response()->json($cart);
    // }
}
