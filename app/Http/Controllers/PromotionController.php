<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index() {
        $promotion1 = Promotion::all()->first();
        $promotion2 = Promotion::skip(1)->take(1)->get();
        dd($promotion1);
        return view('home', [
            'promotion1' => $promotion1,
            'promotion2' => $promotion2
        ]);
    }
}
