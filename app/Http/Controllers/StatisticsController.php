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
        $totalPrice = 0 ;
        foreach($orders as $order){
            $products = json_decode($order->products, true);
            $user = User::find($order->user_id);
            $orderTotalPrice = 0;
            if($products) {
                $orderItems [] =[
                    'order_id' => $order->id,
                    'products' => $products,
                    'user' => $user,
                ];
            }
            foreach($products as $product) {
                $orderTotalPrice += $product['price'] * $product['quantity'];  
            }
            $totalPrice += $orderTotalPrice;
        }

        //dd($orderItems);

        return view('admin.dashboard.index',[
            'clients' => $clients,
            'Products' => Product::all()->count(),
            'productsInCard' => $totalProductsInCard,
            'ordersTotal' => $orders->count(),
            'orders' => $orderItems,
            'totalPrice' => $totalPrice
        ]);
    }
}
