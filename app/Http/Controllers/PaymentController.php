<?php

namespace App\Http\Controllers;

use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        return view('store.payment');
    }

    /* public function index()
    {
        Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        $paymentIntent = PaymentIntent::create([
            'amount' => Cart::where('user_id', Auth::id())->where('etat', 'off')->get()->sum('shipping') + Cart::where('user_id', Auth::id())->where('etat', 'off')->get()->sum('price_total'),
            'currency' => 'usd',
        ]);

        return view('store.payment');
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    ###############  Ajouter Paiement ######################

    public function store(Request $request)
    {
        Stripe::setApiKey('sk_test_51IrSJlGvLviIbupgBiA3wjRCF9qKr1tOFkFsfISpTgkm2C5fxmEVJaIj6xsIItUsxSMXxfjJDmioSqNvR1y4obAb00oXtbQ0fp');
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => Cart::where('user_id', Auth::id())->where('etat', 'off')->get()->sum('shipping') + Cart::where('user_id', Auth::id())->where('etat', 'off')->get()->sum('price_total') * 100,
                'currency' => 'usd',
                'source' => $request->input('stripeToken'),
                'description' => 'Test payment'
            ]);
            Cart::where('user_id', Auth::id())->update([
                'etat' => "on"
            ]);
            Session::flash('success-message', 'Payment done successfully !');
            return Redirect::back();
        } catch (\Exception $e) {
            Session::flash('fail-message', "Error! Please Try again.");
            return Redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
