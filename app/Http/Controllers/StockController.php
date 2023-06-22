<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;


class StockController extends Controller
{
    public function index() {

        $products = Stock::findOrFail(Auth::user()->id)->products;
        $categories = Category::all()->where('stock_id', Auth::user()->id);
        $size = count($categories);
        $suppliers_list = array();

        foreach($products as $i) {
            $product_suppliers = array();
            $product = Product::findOrFail($i->id);
            $suppliers = $product->suppliers;
            foreach($suppliers as $supplier) {
                array_push($product_suppliers, $supplier->name);
            }
            array_push($suppliers_list, $product_suppliers);
        }
    
        return view('stock.index', ['products' => $products, 'suppliers_list' => $suppliers_list, 'categories' => $categories, 'size' => $size, 'suppliers' => Supplier::all()]);
    }

    public function create() {

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('stock.create', ['categories' => $categories, 'suppliers' => $suppliers]);
    }


    public function store(Request $request) {

        $product = Product::create([
            'id' => 1,
            'name' => $request->name,
            'category_id' => $request->categories,
            'unit' => $request->unit,
            'refference_value' => $request->refference_value,
            'maximum_stock_level' => $request->maximum_stock_level,
            'minimum_stock_level' => $request->minimum_stock_level,
            'balance' => 0,
        ]);

        $stock = Stock::findOrFail(Auth::user()->id);

        $product->stocks()->attach($stock->id);

        for($i = 0; $i < count($request->suppliers); $i++) {

            $supplier = Supplier::findOrFail($request->suppliers[$i]);

            $product->suppliers()->attach($supplier->id);
        }

        return redirect('/stock');
    }

    public function update(Request $request) {
        
        Product::findOrFail($request->id)->update($request->all());

        return redirect()->back();
        
    }

    public function destroy($id) {

        Product::findOrFail($id)->delete();

        return redirect()->back();
    }
}
