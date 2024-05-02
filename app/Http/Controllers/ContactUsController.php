<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index() {
        return view('layouts.app',[
            'categories' => Categories::all()
        ]);
    }

    public function send(Request $request) {
        $request->validate([
            'message' => 'required',
            'email' => 'required'
        ]);

        $message = new ContactUs();

        $message->message = $request->input('message');
        $message->email = $request->input('email');

        $message->save();

        return to_route('producthome.index');
    }
}
