<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function buyNow($id) {
        return view('buy.buy', [
            'product' => Product::find($id)
        ]);
    }
}
