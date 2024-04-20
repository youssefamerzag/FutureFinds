<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $cardItems = CardItem::where('card_id', $user->id)->get();
        $productIds = $cardItems->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();
        
        $cardProducts = [];
        foreach ($cardItems as $cardItem) {
            $product = $products->where('id', $cardItem->product_id)->first();
            if ($product) {
                $cardProducts[] = [
                    'card_item' => $cardItem,
                    'product' => $product,
                ];
            }
        }

        return view('card.index' , [
            'cardProducts' => $cardProducts
        ]);
    }

    public function add(Request $request) {
        $productId = $request->input('productId');

        $cardItem = new CardItem();
        $user = Auth::user();

        $cardItem->product_id = $productId;
        $cardItem->quantity = $request->input('quantity');
        $cardItem->card_id = $user->id;

        $cardItem->save();
        
        return to_route('producthome.index');
    }

}
