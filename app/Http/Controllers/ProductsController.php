<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $bestSelling = Product::all()->take(5);
        return view('home' , [
            'products' => Product::all(),
            'categories' => Categories::all(),
            'bestSellingProducts' => $bestSelling,
        ]);
    }

    public function show($id) {
        return view('product.show' , [
            'product' => Product::find($id)
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->input('search');

        return view('product.search', [
            'search' => $search,
            'products' => Product::where('title','like', '%' . $search . '%')->get()
        ]);
    }
}
