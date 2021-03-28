@extends('admin.adlay.master_page')


@section('content')
    

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders List</h1>
</div>

        <div class="container">
            <div class="container">
               
                <br>
            <form action="" class="d-flex">
                <label style="margin-top:5px;" >Search For a Order :</label> &nbsp;<input type="search" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>User_id</td>
                    <td>Product_Id</td>
                    <td>Price_U</td>
                    <td>Name</td>
                    <td>Last Name</td>
                    <td>Phone</td>
                    <td>Adresse</td>
                    <td>City</td>
                    <td>Etat</td>
                    <td>Operations</td>
                </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user_id}}</td>
                    <td>{{$order->product_id}}</td>
                    <td>{{$order->price_u}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->lastname}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->adresse}}</td>
                    <td>{{$order->city}}</td>
                    <td>{{$order->etat}}</td>
                    <td>
                        <form action="{{route('delete.check.order',$order->id)}}" method="post" onsubmit="return confirm('are you sure you to delete this Order ??')" class="d-flex">
                            {{csrf_field()}}
                            <a href="{{route('edit.check.order',$order->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach    
            </table>
        </div>

@endsection