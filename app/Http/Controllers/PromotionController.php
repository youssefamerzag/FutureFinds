<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{

    public function index() {
        return view('admin.dashboard.promotion.index' , [
            'promotions' => Promotion::all()
        ]);
    }

    public function edit($id) {
        return view('admin.dashboard.promotion.edit' , [
            'promotion' => Promotion::find($id)
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'image' => 'required'
        ]);

        $promotion = Promotion::find($id);

        $promotion->title = $request->input('title');

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $image_name = time() . '_' . $extention;
            $image->move(public_path('imgs/promotions'), $image_name);
            $promotion->image = 'imgs/promotions/' . $image_name;
        }

        $promotion->save();

        return to_route('dashboard.promotions');
    }
}
