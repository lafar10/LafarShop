<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Product;
use App\Review;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{

    #############  Liste de Panier #############

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->where('etat', 'on')->where('conf_order', 'off')->get();
        return view('store.my_order', compact('carts'));
    }

    #############  Liste de Reviews #############

    public function get_review_page(Request $request, $id)
    {
        $carts = Cart::findOrFail($id);

        $carts->update([
            'conf_order' => 'on',
        ]);

        return view('store.reviews', compact('carts'));
    }

    #############  Ajouter Reviews #############

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');

        $reviews = Review::create([
            'value' => $request->input('star'),
            'comments' => $request->input('comments'),
            'id_user' => Auth::user()->id,
            'product_id' => $product_id,
        ]);


        return redirect()->route('home')->with('toast_success', 'Your Order Was Passed With Successfully');
    }
}
