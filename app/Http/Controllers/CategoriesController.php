<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($id) {
        return view('category.index' , [
            'products' => Product::where('category_id' , $id)->get(),
            'category' => Categories::find($id)
        ]);
    }

    public function sortBy($id) {
        return view('category.index', [
            'products' => Product::Where('category_id' , $id)->get()->sortby('price'),
            'category' => Categories::find($id)
        ]);
    }

    public function sortByDesc($id) {
        return view('category.index', [
            'products' => Product::Where('category_id' , $id)->get()->sortByDesc('price'),
            'category' => Categories::find($id)
        ]);
    }

}
