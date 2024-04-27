<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index() {
        
        $clients = User::where('role' , 'user')->get()->count();

        $productsInCard = CardItem::all();
        $totalProductsInCard= 0;


        foreach($productsInCard as $productInCard) {
            $totalProductsInCard = $totalProductsInCard + $productInCard->quantity;
        }

        return view('admin.dashboard.index',[
            'clients' => $clients,
            'Products' => Product::all()->count(),
            'productsInCard' => $totalProductsInCard
        ]);
    }
}
