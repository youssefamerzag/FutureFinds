<?php

namespace App\Http\Controllers;

use App\Models\CardItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index() {
        $orders = Order::all();
        $orderItems = [];
        foreach($orders as $order){
            $product = json_decode($order->products, true);
            $user = User::find($order->user_id);
            if($product) {
                $orderTotal = 0;
                foreach($product as $item) {
                    $orderTotal += $item['price'] * $item['quantity'];
                }
                $orderItems [] =[
                    'order' => $order,
                    'products' => $product,
                    'user' => $user,
                    'orderTotal' => $orderTotal,
                ];
            }
        }
    
        return view('admin.dashboard.order.index', [
            'orders' => $orderItems,
        ]);
    }
    

    public function checkout($id) {
        $cardItems = CardItem::where('card_id', $id)->get();
        $productIds = $cardItems->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();
        $cardProducts = [];
        $totalPrice = 0;
        
        foreach ($cardItems as $cardItem) {
            $product = $products->where('id', $cardItem->product_id)->first();
            if ($product) {
                $cardProducts[] = [
                    'card_item' => $cardItem,
                    'product' => $product,
                ];
                $totalPrice += $product->price * $cardItem->quantity;
            }
        }

        $orderproducts = [];

        foreach($cardProducts as $cardProduct) {
            if($cardProduct['product']) {
                $orderproducts[] = [
                        'title' => $cardProduct['product']->title,
                        'price' => $cardProduct['product']->price,
                        'image' => $cardProduct['product']->image,
                        'quantity' => $cardProduct['card_item']->quantity,
                ];
            }

        }

        $productJson = json_encode($orderproducts);

        $userId = Auth::user()->id;

        $order = new Order();
        $order->user_id = $userId;
        $order->products = $productJson;
        $order->save();

        
        return view('card.order' , [
            'cardProducts' => $cardProducts,
            'totalPrice' => $totalPrice
        ]);
    }

}
