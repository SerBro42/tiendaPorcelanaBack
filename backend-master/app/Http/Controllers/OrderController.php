<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $pedido = new Pedido;
        $pedido->id_cliente = $request->input('id_cliente');
        $pedido->save();
        return response()->json(['message'=>'Order placed successfully'], 200);
    }

    public function getLatestOrder()
    {
        $latest = DB::table('pedidos')->latest('id_pedido')->first();
        return response()->json($latest);
    }
}
