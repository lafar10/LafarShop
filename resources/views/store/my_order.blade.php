@extends('layouts.app')


@section('content')

<br>
<div class="container">
    <h4>My Orders List</h4>
        <hr style="color:red;width:155px;">
<br>

        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($carts as $cart)
            <div class="col mb-4">
                <div class="card">
                    <img src="{{asset('/products/produits/'.$cart->products->pic)}}" style="width:298px;height:180px;" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">{{$cart->products->title}}</p>
                            <p class="card-text">Quantity : <strong class="text-muted">{{$cart->quantity}}</strong></p>
                            <h4 class="card-title">{{$cart->price_total*$cart->quantity}} $</h4>
                        </div>
                        <br>
                        <form action="{{ route('get.review.page',$cart->id) }}" method="POST" align="center" class="d-inline"  >
                            @csrf
                            <input type="hidden" id="cart_id" value="{{$cart->id}}">
                            <input type="hidden" id="product_id" value="{{$cart->products->id}}">
                            <a href="{{route('get.details',$cart->products->id)}}"  class="btn btn-outline-secondary">See Details</a>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-outline-danger">Confirm Reception</button>
                        </form>
                        <br>
                </div>
            </div>
            @endforeach
        </div>
<br>

@endsection
