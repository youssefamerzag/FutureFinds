<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users() {
        return view('admin.dashboard.users', [
            'users' => User::all(),
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $cardItems = CardItem::where('card_id', $id)->get();
        $productIds = $cardItems->pluck('product_id')->toArray();
        $products = Product::whereIn('id' , $productIds)->get();
        $cardProducts = [];
    
        foreach ($cardItems as $cardItem) {
            $product = $products->where('id' , $cardItem->product_id)->first();
            if ($product) {
                $cardProducts[] = [
                    'product' => $product,
                    'card_item' => $cardItem
                ];
            }
        }
    
        return view('admin.dashboard.userDetails', [
            'user' => $user,
            'products' => $cardProducts
        ]);
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return to_route('dashboard.users');
    }
}
