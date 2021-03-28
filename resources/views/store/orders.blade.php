@extends('layouts.app')



@section('content')


<div class="container">
    <h2>New Order</h2>
        <hr style="color:red;height:4px;width:150px;">
        <br>
    
    <form action="{{route('Save.Order')}}" method="POST">
        {{ csrf_field() }}

        <input type="hidden" id="product_id" name="product_id" value="{{$products->id}}" >
        <input type="hidden" id="price" name="price" value="{{$products->price}}" >
        <div class="row g-3">
            <div class="col-md-6">
                <label  class="form-label">First Name</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>
            <div class="col-md-6">
                <label  class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname"  id="lastname">
            </div>
            <div class="col-md-12">
                <label  class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="1234 Main St">
            </div>
            <div class="col-md-6">
                <label  class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone"  id="phone" placeholder="(+212) 621458695">
            </div>
            <div class="col-md-6">
                <label  class="form-label">City</label>
                <input type="text" class="form-control" name="city"  id="city">
            </div>
            <br>
            <br>
            <div class="col-md-12" align="center">
                <button  type="submit" class="btn btn-outline-danger" id="order" >Order Now</button>
            </div>
          </div>
        </form>
    </div>

@endsection
