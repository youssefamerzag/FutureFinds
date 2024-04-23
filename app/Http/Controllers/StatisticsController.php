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

        return view('admin.dashboard.index',[
            'clients' => $clients,
            'Products' => Product::all()->count(),
        ]);
    }
}
