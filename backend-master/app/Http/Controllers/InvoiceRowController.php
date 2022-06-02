<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineaPedido;
use Illuminate\Support\Facades\DB;

class InvoiceRowController extends Controller
{
    public function getInvoiceRows() 
    {
        $rows = DB::table("lineas_de_pedido")
        ->select("id_pedido", "cantidad", "id_prod", "precio", "created_at")
        ->get();
        return response()->json($rows);
    }

    public function addInvoiceRow(Request $request)
    {
        $lineaPedido = new LineaPedido;
        $lineaPedido->id_pedido = $request->input('id_pedido');
        $lineaPedido->cantidad = $request->input('cantidad');
        $lineaPedido->id_prod = $request->input('id_prod');
        $lineaPedido->precio = $request->input('precio');
        $lineaPedido->save();
        return response()->json(['message'=>'New invoice row added'], 200);
    }
}
