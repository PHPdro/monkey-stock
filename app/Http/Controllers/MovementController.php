<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Movement;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class MovementController extends Controller
{
    public function index() {

        $products = Stock::findOrFail(Auth::user()->id)->products;

        $movements = Movement::all();

        if(count($movements) > 0) {
            $last = $movements[count($movements) - 1];
            return view('movements.index', ['products' => $products, 'movements' => $movements, 'last' => $last]);
        }

        return view('movements.index', ['products' => $products, 'movements' => $movements]);
    }

    public function create() {

        $products = Stock::findOrFail(Auth::user()->id)->products;

        $suppliers = Supplier::all();

        return view('movements.create', ['products' => $products, 'suppliers' => $suppliers]);

    }

    public function store(Request $request) {

        $product = Product::find($request->product);

        $movement = Movement::create([
            'type' => $request->type,
            'product_id' => $request->product,
            'product_name' => $product->name,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        for($i = 0; $i < count($request->suppliers); $i++) {

            $supplier = Supplier::findOrFail($request->suppliers[$i]);

            $movement->suppliers()->attach($supplier->id);
        }

        if ($request->type == 1) {

            $product->update(['balance' => ($product->balance + $request->quantity)]);

        } else {

            $product->update(['balance' => ($product->balance - $request->quantity)]);
        }
        
        return redirect('/movements');
    }

    public function destroy($id) {

        $movement = Movement::findOrFail($id);

        $product = Product::find($movement->product_id);

        if ($movement->type == 1) {

            $product->update(['balance' => $product->balance - $movement->quantity]);

        } else {

            $product->update(['balance' => $product->balance + $movement->quantity]);
        }

        $movement->delete();

        return redirect()->back();
    }
}
