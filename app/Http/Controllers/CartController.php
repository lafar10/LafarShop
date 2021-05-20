<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{

    #############  Liste Panier ##############

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->where('etat', 'off')->get();
        return view('store.cart', compact('carts'));
    }

    #############  Ajouter Panier ##############

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $shipping = $request->input('shipping');

        if (Auth::check()) {
            if (Cart::where('user_id', Auth::user()->id)->Where('product_id', $product_id)->where('etat', 'off')->exists()) {
                return back()->with('toast_error', 'This Product Was Already Exists In The Cart !!');
            } else {
                $carts = Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' =>  $product_id,
                    'price' =>  $request->input('price'),
                    'quantity' => $quantity,
                    'price_total' => $price * $quantity,
                    'etat' => 'off',
                    'shipping' => $shipping,
                ]);

                $carts->save();
                return back()->with('toast_success', 'Add to Cart With Success');
            }
        } else {
            return redirect()->route('login');
        }
    }


    #############  Supprimer Panier ##############

    public function destroy($id)
    {
        $carts = Cart::findOrFail($id);

        if (!$carts)
            return redirect()->back();

        $carts->delete();
        return redirect()->route('cart-index')->with('toast_success', 'Product Was Deleted From Cart With Success !!');
    }

    #############  Modifier Panier ##############

    public function update_cart(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        $carts = Cart::findOrFail($id);

        if (!$carts)
            return redirect()->back();

        $carts->update([
            'quantity' => $quantity,
            'price_total' => $price * $quantity,
        ]);
        $carts->save();
    }
}
