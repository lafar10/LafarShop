@extends('layouts.app')


@section('content')

        <br>
        @if(Auth::check())
            <div class="container">
                <h4>My Cart List</h4>
                    <hr style="color:red;width:140px;">
        <br>
            <table class="table">
                <thead class="table-danger">
                        <tr>
                            <th scope="col" class="border-0 ">
                                <div >Picture</div>
                            </th>
                            <th scope="col" class="border-0 ">
                                <div >Product Name</div>
                            </th>
                            <th scope="col" class="border-0 ">
                                <div >Price</div>
                            </th>
                            <th scope="col" class="border-0 ">
                                <div>Quantity</div>
                            </th>
                            <th scope="col" class="border-0 ">
                                <div>Operations</div>
                            </th>
                        </tr>
                </thead>

                <tbody>
                  @foreach ($carts as $cart)
                    <tr>
                        <td><img src="{{asset('/products/produits/'.$cart->products->pic)}}" style="width:120px;height:90px;" alt=""></td>
                        <td style="margin-top:5px;"><a href="{{route('get.details',$cart->products->id)}}">{{$cart->products->title}}</a></td>
                        <td><h5>{{$cart->price*$cart->quantity}} $</h5></td>
                        <td>
                            <form action="{{route('updated.cart',$cart->id)}}" method="POST" >
                                @csrf
                                @method('UPDATE')
                                <input type="hidden" value="{{$cart->products->price}}" id="Price" name="this_price" >
                                <input type="hidden" value="{{$cart->id}}" name="cart_id" id="cart_id" >
                                <input type="hidden" value="{{$cart->products->id}}" name="product_id" >
                                <select class="form-select" name="quantity" id="quantity" style="width:60px;" >
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{$i}}"   {{ $i == $cart->quantity ? 'selected':'' }} >{{$i}}</option>
                                    @endfor
                                </select>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('deleted.cart',$cart->id)}}" class="d-inline" method="post" onsubmit="return confirm('Are You Sure you want to Delete this data')">
                                @csrf
                                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>

            </table>
            <br>
            <br>
            <br>
            <div class="row py-5 p-4 bg-light rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-danger rounded-pill px-4 py-3 text-uppercase font-weight-bold" style="color:white;">Coupon code</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                        <div class="input-group-append border-0">
                                            <button id="button-addon3" type="button" class="btn btn-outline-danger px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                        </div>
                                </div>
                        </div>
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
            </div>
                    <div class="col-lg-6">
                        <div class="bg-danger rounded-pill px-4 py-3 text-uppercase font-weight-bold" style="color:white;">Order summary </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><h3>{{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('price_total')}} $</h3></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><h3>{{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('shipping')}} $</h3></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong> <h3>{{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('shipping')+App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('price_total')}} $</h3></li>
                                    </ul>
                                <a href="{{route('order.check',Auth::id())}}" class="btn btn-outline-danger rounded-pill py-2 btn-block"><i class="fas fa-cash-register"></i> CheckOut</a>
                            </div>
                        </div>
                    </div>

            </div>
            @else

                <div class="d-flex justify-content-center">
                    <h3>Cart Empty</h3>
                </div>

            @endif

@endsection


@section('scripts')

<script>

$('#quantity').click(function (e) {
    e.preventDefault();

    $.ajax({
        url: "/updated.cart/" + $("#cart_id").val(),
        type: 'POST',
        data: {
        '_token': $('input[name=_token]').val(),
        'quantity':$('#quantity').val(),
        'price_total':$('#Price').val()*$('#quantity').val(),
            },
        success: function (response) {

        }
    });
});



</script>

@endsection
