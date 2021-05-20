<?php

namespace App\Http\Controllers;

use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class WishController extends Controller
{

    #############  Liste de Coeur #############

    public function index()
    {
        $wishes = Wish::where('user_id', Auth::id())->get();
        return view('store.wish', compact('wishes'));
    }

    #############  Ajouter Produit Coeur #############

    public function store(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Auth::check()) {
            if (Wish::where('user_id', Auth::user()->id)->Where('product_id', $product_id)->exists()) {
                return back()->with('toast_error', 'This Product Was Already Exists !!');
            } else {
                $wishes = Wish::create([
                    'user_id' => Auth::user()->id,
                    'product_id' =>  $product_id,
                    'status' => 'off',
                ]);

                return back()->with('toast_success', 'Add to Favorite With Success');
            }
        } else {
            return redirect()->route('login');
        }
    }

    #############  Supprimer Produit Coeur #############

    public function destroy($id)
    {
        $wishes = Wish::findOrFail($id);

        if (!$wishes)
            return redirect()->back();

        $wishes->delete();
        return redirect()->back()->with('toast_success', 'Wish Product Was Deleted With Successfully ^-^');
    }
}
