@extends('admin.adlay.master_page')



@section('content')


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cart Update </h1>
        </div>
                <br>
                <br>
        <div class="container">
            <form action="{{route('update.cart')}}" method="POST">
               {{csrf_field()}}
                <input type="hidden" name="cart_id" value="{{$carts->id}}">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label  class="form-label">User ID</label>
                        <input type="text" class="form-control" name="user_id" value="{{$carts->user_id}}" >
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Product ID</label>
                        <input type="text" class="form-control" name="product_id"  value="{{$carts->product_id}}">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Quantité</label>
                        <input type="text" class="form-control" name="quantity"  value="{{$carts->quantity}}">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Price</label>
                        <input type="text" class="form-control" name="price_total"  value="{{$carts->price_total}}">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Etat</label>
                        <select name="etat" class="form-control" >
                            <option >{{$carts->etat}}</option>
                            <option >on</option>
                            <option >off</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Confirmation Order</label>
                        <select name="conf_order" class="form-control" >
                            <option >{{$carts->conf_order}}</option>
                            <option >on</option>
                            <option >off</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Shipping</label>
                        <input type="text" class="form-control" name="shipping"  value="{{$carts->shipping}}">
                    </div>

                    <div class="col-md-12" align="center">
                        <br>
                        <input type="hidden" name="cart_id" value="{{$carts->id}}">
                        <a  href="{{route('get.admin.carts')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button  type="submit"   class="btn btn-danger" style="border-radius:0%;width:250px;"  >Update Now</button>
                        <br>
                        <br>
                    </div>
                  </div>
            </form>
        </div>

@endsection


