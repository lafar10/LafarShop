<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Check;
use App\Order;
use App\Review;
use App\Product;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;


class AdminController extends Controller
{

    #############  Dashboard ##############

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    #############  Reviews  ##############

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }


    ////////////////////// Category Manage //////////////////


    public function categories()
    {
        $categories = Categorie::all();
        return view('admin.categories', compact('categories'));
    }

    public function get_store()
    {
        return view('admin.cate_create');
    }

    #############  Ajouter Categorie ##############

    public function category_store(Request $request)
    {

        $categories = Categorie::create([
            'categorie_name' => $request->input('categorie_name'),
            'icon' => $request->input('icon'),
        ]);

        $categories->save();
    }

    #############  Modifier Categorie ##############

    public function category_edit($id)
    {
        $categories = Categorie::find($id);

        if (!$categories)
            return back();


        return view('admin.cate_edit')->with('categories', $categories);
    }

    public function category_update(Request $request)
    {
        $categories = Categorie::find($request->input('categorie_id'));

        if (!$categories)
            return back();

        $categories->update($request->all());
        return redirect()->route('get.admin.categories')->with('toast_success', 'Updated With successfully !!');;
    }


    #############  Supprimer Categorie ##############

    public function category_delete(Request $request)
    {
        $categories = Categorie::find($request->input('categorie_id'));

        if (!$categories)
            return back();

        $categories->delete();
        return redirect()->route('get.admin.categories')->with('toast_success', 'Deleted With successfully !!');;
    }


    #############  Rechercher  Categorie ##############

    public function category_search(Request $request)
    {
        $search = $request->input('search_category');

        $categories = Categorie::where('id', 'like', "%$search%")
            ->orwhere('categorie_name', 'like', "%$search%")
            ->orwhere('icon', 'like', "%$search%")
            ->get();

        return view('admin.categories')->with('categories', $categories);
    }


    ////////////////////// Cart Manage //////////////////

    #############  Panier ##############

    public function carts()
    {
        $carts = Cart::all();
        return view('admin.carts', compact('carts'));
    }

    #############  Modifier Panier ##############

    public function cart_edit($id)
    {
        $carts = Cart::find($id);

        if (!$carts)
            return back();


        return view('admin.cart_edit')->with('carts', $carts);
    }

    public function cart_update(Request $request)
    {
        $carts = Cart::find($request->input('cart_id'));

        if (!$carts)
            return back();

        $carts->update($request->all());
        return redirect()->route('get.admin.carts')->with('toast_success', 'Updated With successfully !!');;
    }

    #############  Supprimer Panier ##############

    public function cart_delete(Request $request)
    {
        $carts = Cart::find($request->input('cart_id'));

        if (!$carts)
            return back();

        $carts->delete();
        return redirect()->route('get.admin.carts')->with('toast_success', 'Deleted With successfully !!');;
    }

    public function cart_search(Request $request)
    {
        $search = $request->input('search_cart');

        $carts = Cart::where('id', 'like', "%$search%")
            ->orwhere('user_id', 'like', "%$search%")
            ->orwhere('product_id', 'like', "%$search%")
            ->orwhere('etat', 'like', "%$search%")
            ->orwhere('conf_order', 'like', "%$search%")
            ->get();

        return view('admin.carts')->with('carts', $carts);
    }

    ////////////////////// Product Manage //////////////////


    public function products()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }


    public function get_product_store()
    {
        return view('admin.add_products');
    }

    #############  Rechrcher Produit ##############

    public function search_product(Request $request)
    {
        $search = $request->input('search_product');

        $products = Product::where('id', 'like', "%$search%")
            ->orWhere('marque', 'like', "%$search%")
            ->orWhere('title', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('shipping', 'like', "%$search%")
            ->get();

        return redirect()->route('get.admin.products')->with('products', $products);
    }

    #############  Ajouter Produit ##############

    public function product_store(Request $request)
    {
        $rules = [
            'marque' => 'required|min:10|max:26',
            'title' => 'required|min:10|max:26',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'pic' => 'required',
            'id_cat' => 'required',
            'shipping' => 'required',
        ];

        $messages = [
            'marque.required' => 'Marque is required',
            'title.required' => 'Title is required',
            'description.required' => 'description is required',
            'price.required' => 'price is required',
            'quantity' => 'quantity is required',
            'pic' => 'picture is required',
            'id_cat' => 'ID Category is required',
            'shipping' => 'shipping is required',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        if ($request->hasfile('pic')) {
            $file_extension = $request->pic->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'products/produits/';
            $request->pic->move($path, $file_name);
        }


        $products = Product::create([
            'marque' => $request->input('marque'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'pic' => $file_name,
            'promotion' => $request->input('promotions'),
            'price_promos' => $request->input('price_promos'),
            'id_cat' => $request->input('id_cat'),
            'shipping' => $request->input('shipping'),
        ]);


        return redirect()->route('get.products')->with('toast_success', 'Created With Successfully!!');
    }

    #############  Modifier Produit ##############

    public function edit_product($id)
    {
        $products = Product::find($id);

        if (!$products)
            return back();

        return view('admin.edit_product', compact('products'));
    }

    public function update_product(Request $request)
    {
        $products = Product::find($request->product_id);


        $rules = [
            'pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = [
            'pic' => 'picture is required',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        if (!$products)
            return back();

        if ($request->hasfile('pic')) {
            $file_extension = $request->pic->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'products/produits/';
            $request->pic->move($path, $file_name);
        }


        $products->update([
            'marque' => $request->input('marque'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'pic' => $file_name,
            'promotion' => $request->input('promotions'),
            'price_promos' => $request->input('price_promos'),
            'id_cat' => $request->input('id_cat'),
            'shipping' => $request->input('shipping'),
        ]);

        return redirect()->route('get.products')->with('toast_success', 'Updated With successfully !!');
    }


    #############  Supprimer Produit ##############

    public function delete_product($id)
    {
        $products = Product::find($id);

        if (!$products)
            return  back();


        $products->delete();
        return redirect()->back()->with('toast_success', 'Deleted With Successfully !!');
    }

    #############  Rechercher Produit ##############

    public function product_search(Request $request)
    {
        $search = $request->input('search_product');

        $products = Product::where('id', 'like', "%$search%")
            ->orWhere('marque', 'like', "%$search%")
            ->orWhere('title', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->get();

        return view('admin.products')->with('products', $products);
    }

    ////////////////////  Order Manage /////////////////////////


    public function orders()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    #############  Liste single Command   ##############

    public function check_single_order()
    {
        $orders = Order::where('etat', 'off')->get();
        return view('admin.check_order')->with('orders', $orders);
    }

    #############  Rechercher Command ##############

    public function search_order_check(Request $request)
    {
        $search = $request->input('search_order');

        $orders = Order::where('id', 'like', "%$search%")
            ->orWhere('user_id', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->orWhere('lastname', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->where('etat', 'off')
            ->get();

        return redirect()->route('admin.check_order')->with('orders', $orders);
    }

    #############  Modifier Command ##############

    public function edit_check_order($id)
    {
        $orders = Order::find($id);

        return view('admin.order_update')->with('orders', $orders);
    }

    public function update_check_order(Request $request)
    {


        $rules = [
            'user_id' => 'min:1|max:11',
            'product_id' => 'min:1|max:26',
            'adresse' => 'min:3|max:70',
            'name' => 'min:1|max:26',
            'lastname' => 'min:1|max:26',
            'phone' => 'min:10|max:14',
            'city' => 'min:1|max:40',
        ];

        $messages = [
            'user_id.required' => 'User_ID is Between 1 & 11',
            'product_id.required' => 'Product_ID is Between 10 & 26',
            'adresse.required' => 'Adresse is Between 3 & 70',
            'name.required' => 'Name is Between 10 & 26',
            'lastname' => 'LastName is Between 10 & 26',
            'phone' => 'Phone is Between 10 & 14',
            'city' => ' City is Between 1 & 40',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        $orders = Order::find($request->input('order_id'));

        if (!$orders)
            return  back();


        $orders->update($request->all());
        return redirect()->route('get.admin.orders')->with('toast_success', 'Order Was Updated With Successfully !!');
    }


    #############  Supprimer Command ##############

    public function delete_check_order($id)
    {
        $orders = Order::find($id);

        if (!$orders)
            return  back();


        $orders->delete();
        return redirect()->back()->with('toast_success', 'Order Was Deleted With Successfully !!');
    }



    ////////////////////  Multi Order Manage /////////////////////////

    #############  Liste Multi Command ##############

    public function check_orders()
    {
        $checks = Check::all();
        return view('admin.multi_orders', compact('checks'));
    }


    public function check_multi_order()
    {
        $orders = Check::where('etat', 'off')->get();
        return view('admin.check_multi_order')->with('orders', $orders);
    }

    #############  Rechrcher Multi Command ##############

    public function search_mulit_order(Request $request)
    {
        $search = $request->input('search_multi_order');

        $checks = Check::where('id', 'like', "%$search%")
            ->orWhere('user_id', 'like', "%$search%")
            ->orWhere('name', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->where('etat', '=', 'off')
            ->get();

        return view('admin.multi_orders')->with('checks', $checks);
    }

    #############  Modifier Multi Command ##############

    public function edit_multi_order($id)
    {
        $checks = Check::find($id);

        return view('admin.multi_order_update')->with('checks', $checks);
    }

    public function update_multi_order(Request $request)
    {


        $rules = [
            'user_id' => 'min:1|max:11',
            'total_price' => 'min:1|max:26',
            'adresse' => 'min:3|max:70',
            'name' => 'min:1|max:50',
            'phone' => 'min:10|max:14',
            'city' => 'min:1|max:40',
        ];

        $messages = [
            'user_id.required' => 'User_ID is Between 1 & 11',
            'product_id.required' => 'Product_ID is Between 10 & 26',
            'adresse.required' => 'Adresse is Between 3 & 70',
            'name.required' => 'Name is Between 10 & 50',
            'phone' => 'Phone is Between 10 & 14',
            'city' => ' City is Between 1 & 40',
        ];

        $validator =  Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        $checks = Check::find($request->input('check_order_id'));

        if (!$checks)
            return  back();


        $checks->update($request->all());

        return redirect()->route('get.admin.check_orders')->with('toast_success', 'Order Was Updated With Successfully !!');
    }

    #############  Supprimer Multi Command ##############

    public function delete_multi_order($id)
    {
        $checks = Check::find($id);

        if (!$checks)
            return  back();


        $checks->delete();
        return redirect()->back()->with('toast_success', 'Order Was Deleted With Successfully !!');
    }

    #############  Liste Multi Command Non Confirmer ##############

    public function get_command_products(Request $request)
    {
        $user_id = $request->input('user_id');

        $carts = Cart::where('user_id', $user_id)->where('conf_order', 'off')->get();

        return view('admin.multi_order_products', compact('carts'));
    }


    ////////////////////// Users Manage //////////////////

    #############  Liste Users ##############

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    #############  Modifier Users ##############

    public function user_edit($id)
    {
        $users = User::find($id);

        if (!$users)
            return back();


        return view('admin.user_edit')->with('users', $users);
    }

    public function user_update(Request $request)
    {
        $users = User::find($request->input('user_id'));

        if (!$users)
            return back();

        $users->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'city' => $request->input('city'),
            'adresse' => $request->input('adresse'),
            'usertype' => $request->input('type'),
        ]);
        return redirect()->route('get.admin.users')->with('toast_success', 'Updated With successfully !!');;
    }

    #############  Supprimer Users ##############

    public function user_delete(Request $request)
    {
        $users = User::find($request->input('user_id'));

        if (!$users)
            return back();

        $users->delete();
        return redirect()->route('get.admin.users')->with('toast_success', 'Deleted With successfully !!');;
    }

    #############  Rechercher Users ##############

    public function user_search(Request $request)
    {
        $search = $request->input('search_user');

        $users = User::where('id', 'like', "%$search%")
            ->orwhere('name', 'like', "%$search%")
            ->orwhere('email', 'like', "%$search%")
            ->orwhere('adresse', 'like', "%$search%")
            ->get();

        return view('admin.users')->with('users', $users);
    }
}
