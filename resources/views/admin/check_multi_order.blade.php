@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Check Mulit Order List </h1>
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
                        <td>Price Total</td>
                        <td>Full Name</td>
                        <td>Phone</td>
                        <td>Adresse</td>
                        <td>City</td>
                        <td>Etat</td>
                        <td>Command Details</td>
                        <td>Operations</td>
                    </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user_id}}</td>
                        <td>{{$order->price_total}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->adresse}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->etat}}</td>
                        <td>
                            <form action="{{route('get.command.products',$order->user_id)}}" method="get" class="d-flex">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{$order->user_id}}">
                                <button type="submit" class="btn btn-secondary">See Product</button>&nbsp;&nbsp;
                            </form>
                        </td>
                        <td>    
                            <form action="{{route('delete.multi.order',$order->id)}}" method="post" onsubmit="return confirm('are you sure you to delete this Order ??')" class="d-flex">
                                {{csrf_field()}}
                                <a href="{{route('edit.check.order',$order->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                                <button  type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </table>
        </div>

@stop
