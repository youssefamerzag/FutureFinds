<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardItem;
use App\Models\Order;
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

        $orders = Order::all();
        $orderItems = [];
        foreach($orders as $order){
            $product = json_decode($order->products, true);
            $user = User::find($order->user_id);
            if($product) {
                $orderItems [] =[
                    'order_id' => $order->id,
                    'products' => $product,
                    'user' => $user,
                ];
            }
        }

        //dd($orderItems);

        return view('admin.dashboard.index',[
            'clients' => $clients,
            'Products' => Product::all()->count(),
            'productsInCard' => $totalProductsInCard,
            'ordersTotal' => $orders->count(),
            'orders' => $orderItems
        ]);
    }
}
