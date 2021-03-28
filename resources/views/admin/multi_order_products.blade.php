@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Multi Command Products List </h1>
</div>

        <div class="container">
                   
                <br>
                <form action="{{route('search.multi.order')}}" method="get" class="d-flex">
                    <label style="margin-top:5px;" >Search For a Order :</label> &nbsp;<input type="search" name="search_order" class="form-control" style="width:200px;">&nbsp;&nbsp;
                    <button type="submit"  class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>
                </form>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>User_id</td>
                        <td>Product ID</td>
                        <td>Quantité</td>
                        <td>Price Total</td>
                        <td>Etat</td>
                        <td>Confirmation Order</td>
                        <td>Shipping</td>
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
                        <td>
                            <form action="" method="post" onsubmit="return confirm('are you sure you to delete this Order ??')" class="d-flex">
                                {{csrf_field()}}
                                <a href="{{route('get.details',$cart->product_id)}}" class="btn btn-secondary">See Details</a>&nbsp;
                                <a href="" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                                <button  type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </table>
        </div>

@stop
