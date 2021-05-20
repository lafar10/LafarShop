@extends('layouts.app')



@section('content')


<div class="container">
    <h2>New Order</h2>
        <hr style="color:red;height:4px;width:150px;">
        <br>
        <form accept-charset="UTF-8" action="{{route('Save.Check')}}" class="require-validation"
        data-cc-on-file="false"
        data-stripe-publishable-key="sk_test_4eC39HqLyjWDarjtT1zdp7dc"
        id="payment-form" method="post">
        {{ csrf_field() }}
        <div class="row g-3">
            <div class="col-md-6">
                <label  class="form-label">First Name</label>
                <input type="text" class="form-control" value="{{$users->name}}" name="name" id="name" >
            </div>
            <div class="col-md-6">
                <label  class="form-label">Total Price $</label>
                <input type="text" id="disabledTextInput"  name="total"  id="total" value="{{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('shipping')+App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('price_total')}}" class="form-control" readonly>
            </div>
            <div class="col-md-12">
                <label  class="form-label">Adresse</label>
                <input type="text" class="form-control" value="{{$users->adresse}}" name="adresse" id="adresse" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label  class="form-label">Phone Number</label>
                <input type="text" class="form-control" value="{{$users->phone}}" name="phone"  id="phone" placeholder="(+212) 621458695">
            </div>
            <div class="col-md-6">
                <label  class="form-label">City</label>
                <input type="text" class="form-control" value="{{$users->city}}" name="city"  id="city">
            </div>
            <div class='col-md-12'>
                    <button class='form-control btn btn-outline-danger submit-button'
                    type='submit' style="margin-top: 10px;"><i class="far fa-submit"></i> Order Now</button>
                    &nbsp;&nbsp;
                    <a class='form-control btn btn-outline-info'
                    href='{{route('payment.index')}}' style="margin-top: 10px;"><i class="far fa-credit-card"></i>  Pay - Method</a>
            </div>
        </form>
    </div>

@endsection
