<?php

namespace App\Http\Controllers;

use App\Models\CardItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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

        return view('card.order' , [
            'cardProducts' => $cardProducts,
            'totalPrice' => $totalPrice
        ]);
    }
}
