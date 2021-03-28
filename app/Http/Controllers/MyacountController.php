<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MyacountController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);

        return view('store.my_acount', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user)
            return back()->with('toast_error', 'Something Wrong !?');

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'city' => $request->input('city'),
            'adresse' => $request->input('adresse'),
        ]);
        return redirect()->route('LAStore')->with('toast_success', 'Updated With Successfully ^.^');
    }
}
