<?php

namespace App\Http\Controllers;

use App\User;
use App\Check;
use App\Order;
use App\Product;
use App\Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index($id)
    {
        $products = Product::findOrFail($id);

        return view('store.orders', compact('products'));
    }

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $price = $request->input('price');
        if (Auth::check()) {
            $orders = Order::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product_id,
                'price_u' => $price,
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'phone' => $request->input('phone'),
                'adresse' => $request->input('adresse'),
                'city' => $request->input('city'),
            ]);

            return redirect()->route('LAStore')->with('toast_success', 'Your Order Was Passed With Successfully');
        } else {
            $orders = Order::create([
                'user_id' => '-1',
                'product_id' => $product_id,
                'price_u' => $price,
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'phone' => $request->input('phone'),
                'adresse' => $request->input('adresse'),
                'city' => $request->input('city'),
            ]);

            return redirect()->route('LAStore')->with('toast_success', 'Your Order Was Passed With Successfully');
        }
    }

    public function check_index($id)
    {
        $users = User::findOrFail($id);

        return view('store.check_out_order', compact('users'));
    }


    public function check_store(Request $request)
    {
        Cart::where('user_id', Auth::id())->update([
            'etat' => "on"
        ]);

        $p_total = $request->input('total');

        $checks = Check::create([
            'user_id' => Auth::user()->id,
            'price_total' => $p_total,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'adresse' => $request->input('adresse'),
            'city' => $request->input('city'),
        ]);

        return redirect()->route('LAStore')->with('toast_success', 'Your Order Was Passed With Successfully');
    }
}
