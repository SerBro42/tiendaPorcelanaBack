<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function createCustomer(Request $request)
    {
        $cliente = Cliente::where('id_cliente', '=', $request->input('id_cliente'))->first();
        if ($cliente === null)
        {
            $cliente = new Cliente;
            $cliente->id_cliente = $request->input('id_cliente');
            $cliente->save();
            return response()->json(['message'=>'Customer created successfully'], 200);
        }
    }
}
