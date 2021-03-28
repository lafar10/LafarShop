@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Carts </h1>
</div>

        <div class="container">
            <div class="container">
         
                <br>
            <form action="{{route('search.cart')}}" method="GET" class="d-flex">
                @csrf
                <label style="margin-top:5px;" >Search For a Cart :</label> &nbsp;<input type="search" name="search_cart" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>User_Id</td>
                    <td>Product_Id</td>
                    <td>Quantity</td>
                    <td>Price_Total</td>
                    <td>Etat</td>
                    <td>Confirmation_Order</td>
                    <td>Shipping</td>
                    <td>Created_At</td>
                    <td>Updated_At</td>
                    <td>Operations</td>
                </tr>
            @foreach($carts as $cart)
                <tr>
                    <td>{{$cart->id}}</td>
                    <td>{{$cart->user_id}}</td>
                    <td>{{$cart->product_id}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price_total}}</td>
                    <td>{{$cart->etat}}</td>
                    <td>{{$cart->conf_order}}</td>
                    <td>{{$cart->shipping}}</td>
                    <td>{{$cart->created_at}}</td>
                    <td>{{$cart->updated_at}}</td>
                    <td>
                        <form action="{{route('delete.cart')}}" method="POST" class="d-flex" onsubmit="return confirm('Are You Sure ??')">
                            @csrf
                            <input type="hidden" name="cart_id" value="{{$cart->id}}">
                            <a href="{{route('edit.cart',$cart->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

@endsection
