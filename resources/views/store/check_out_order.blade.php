@extends('layouts.app')



@section('content')


<div class="container">
    <h2>New Order</h2>
        <hr style="color:red;height:4px;width:150px;">
        <br>
    
    <form action="{{route('Save.Check')}}" method="POST">
        {{ csrf_field() }}
        <div class="row g-3">
            <div class="col-md-6">
                <label  class="form-label">First Name</label>
                <input type="text" class="form-control" value="{{$users->name}}" name="name" id="name" >
            </div>
            <div class="col-md-6">
                <label  class="form-label">Total Price $</label>
                <input type="text" id="disabledTextInput"  name="total"  id="total" value="{{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('price_total')}}" class="form-control" readonly>
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
            <br>
            <br>
            <div class="col-md-12" align="center">
                <button  type="submit" class="btn btn-outline-danger" id="order" ><i class="fas fa-paper-plane"></i> Order Now</button>
            </div>
          </div>
        </form>
    </div>

@endsection
