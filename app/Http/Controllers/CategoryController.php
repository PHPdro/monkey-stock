<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function store(Request $request) {

        $categories = Category::all();

        if(count($categories) == 0) { 

            Category::create([
                'id' => 1,
                'name' => $request->new_category,
                'stock_id' => Auth::user()->id,
            ]);

        } else {

            Category::create([
                'id' => count($categories) + 1,
                'name' => $request->new_category,
                'stock_id' => Auth::user()->id,
            ]);
        }

        return redirect()->back();
    }

    public function destroy($id) {

        Category::findOrFail($id)->delete();
        $categories = Category::all();

        if ($id == 1) {

            for ($i = 0; $i < count($categories); $i++) {

                Category::find($categories[$i]->id)->update(['id' => ($categories[$i]->id - 1)]);
            }

        } else {

            for ($i = 1; $i < count($categories); $i++) {

                if ($categories[$i]->id != ($categories[$i - 1]->id + 1)) {

                    Category::find($categories[$i]->id)->update(['id' => ($categories[$i]->id - 1)]);
                }
            }
        }

        return redirect()->back();
    }
}
