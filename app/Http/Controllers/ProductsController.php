<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ProductsController extends Controller
{
    public function index() {
        $bestSelling = Product::all()->take(5);
        return view('home' , [
            'products' => Product::all(),
            'categories' => Categories::all(),
            'bestSellingProducts' => $bestSelling,
        ]);
    }

    public function show($id) {
        return view('product.show' , [
            'product' => Product::find($id)
        ]);
    }

    public function search(Request $request) {
        $request->validate([
            'search' => 'required'
        ]);

        $search = $request->input('search');

        return view('product.search', [
            'search' => $search,
            'products' => Product::where('title','like', '%' . $search . '%')->get()
        ]);
    }


    //Dashboad 
    public function create() {
        return view('admin.dashboard.product.create');
    }

    public function store(Request $request) {

        $product = new Product();
    
        $userId = Auth::user()->id;
    
        $product->title = $request->input('product_title');
        $product->description = $request->input('product_description');
        $product->price = $request->input('product_price');
        $product->user_id = $userId;
        $product->category_id = $request->input('category');
    
        if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $extention = $image->getClientOriginalExtension();
            $file_name = time() . $product->title . "." . $extention;
            $image->move(public_path('imgs'), $file_name);
            $product->image = $file_name;
        }

        $product->save();
    
        return to_route('dashboard.index');
    }   

    public function edit($id) {
        return view('admin.dashboard.product.edit', [
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request , $id) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        $product = Product::find($id);

        $userId = Auth::user()->id;

        $product->title = $request->input('product_title');
        $product->description = $request->input('product_description');
        $product->price = $request->input('product_price');
        $product->user_id = $userId;
        $product->category_id = $request->input('category');

        if($request->hasFile('product_image')){
            $image = $request->input('product_image');
            $extention = $image->getClientOriginalExtension();
            $file_name = time() . $product->title . "." . $extention;
            $image->move(public_path('imgs'), $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return to_route('dashboard.index');
    }
    
    public function destory($id) {
        $product = Product::find($id);
        $product->delete();
        return to_route('dashboard.index');
    }

    public function DashoardIndex() {
        return view('admin.dashboard.product.index', [
            'products' => Product::all(),
        ]);
    }
}