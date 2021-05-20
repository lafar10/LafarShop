<?php

namespace App\Http\Controllers;


use DB;
use App\Wish;
use App\Review;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    #############  Liste des Produits en Acceil ##############

    public function index()
    {
        $promotions = DB::table('products')->inRandomOrder()->take(6)->get();
        $items = DB::table('products')->inRandomOrder()->take(24)->get();
        $womens = DB::table('products')->inRandomOrder()->where('id_cat', '=', '1')->get();
        $mens = DB::table('products')->inRandomOrder()->where('id_cat', '=', '2')->get();
        $watches = DB::table('products')->inRandomOrder()->where('id_cat', '=', '5')->get();
        $sports = DB::table('products')->inRandomOrder()->where('id_cat', '3')->get();
        $electronics = DB::table('products')->inRandomOrder()->where('id_cat', '=', '4')->get();

        return view('home', compact('promotions', 'items', 'womens', 'mens', 'watches', 'sports', 'electronics'));
    }


    public function details()
    {
        $promotions = DB::table('products')->inRandomOrder()->take(6)->get();

        return view('store.details', compact('promotions', 'comments'));
    }

    #############  Lister les Produits par ID ##############

    public function get_by_categories($id)
    {
        $all = Product::where('id_cat', $id)->get();

        return view('store.all', compact('all'));
    }

    #############  Liste des Produits en Promotion ##############

    public function latest()
    {
        $all = DB::table('products')->inRandomOrder()->where('promotion', '=', 'oui')->get();

        return view('store.all', compact('all'));
    }

    #############  Rechercher des Produits en Acceil ##############

    public function search(Request $request)
    {
        $search = $request->input('search');
        $all = Product::where('title', 'like', "%$search%")
            ->orWhere('marque', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->get();
        return view('store.all')->with('all', $all);
    }

    #############  Produits Details ##############

    public function get_details($id)
    {
        $details = Product::find($id);

        $promotions = DB::table('products')->inRandomOrder()->take(6)->get();

        $comments = Review::orderBy('created_at', 'desc')->where('product_id', '=', $details->id)->get();

        return view('store.details', compact('promotions', 'details', 'comments'));
    }


    #############  Liste de toutes les Produits en Promotion ##############

    public function get_all_promotion()
    {
        $all = DB::table('products')->where('promotion', '=', 'oui')->get();

        return view('store.all', compact('all'));
    }

    public function get_all_products()
    {
        $all = DB::table('products')->get();

        return view('store.all', compact('all'));
    }

    #############  Liste des Produits en des femmes ##############

    public function get_womens_models()
    {
        $all = DB::table('products')->where('id_cat', '=', '1')->get();

        return view('store.all', compact('all'));
    }

    #############  Liste des Produits en des Hommes ##############

    public function get_mens_models()
    {
        $all = DB::table('products')->where('id_cat', '=', '2')->get();

        return view('store.all', compact('all'));
    }
}
