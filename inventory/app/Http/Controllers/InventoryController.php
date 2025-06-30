<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InventoryController extends Controller
{
    public function getInventory()
    {
        // Consulta los datos de la tabla 'stocks' y sus relaciones
        $inventory = DB::table('stocks')
            ->join('products', 'stocks.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.name', 'categories.name as category', 'stocks.quantity', 'stocks.purchase_price', 'stocks.sell_price')
            ->get();

        return response()->json($inventory);
    }
}
