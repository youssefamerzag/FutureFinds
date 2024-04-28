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

        //total


        return view('card.index' , [
            'card' => Card::find($user->id),
            'cardProducts' => $cardProducts,
            'totalPrice' => $totalPrice
        ]);
    }

    public function add(Request $request, $id) {
        

        $cardItem = new CardItem();
        $user = Auth::user();
        
        $cardItem->product_id = $id;
        $cardItem->quantity = $request->input('quantity');
        $cardItem->card_id = $user->id;

        $cardItem->save();
        
        return redirect('product/'.$id);
    }

    public function buyNow(Request $request, $id) {
        $cardItem = new CardItem();
        $user = Auth::user();

        $cardItem->product_id = $id;
        $cardItem->quantity = $request->input('quantity');
        $cardItem->card_id = $user->id;

        $cardItem->save();
        
        return redirect('card');
    }

    public function destroy($id) {

        $cardItem = CardItem::find($id);
        $cardItem->delete();
        return to_route('card.items');
    }

}
