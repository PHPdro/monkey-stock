<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function store(Request $request) {

        $supplier = Supplier::create([

            'name' => $request->new_supplier,
        ]);

        return redirect()->back();
        
    }
}
