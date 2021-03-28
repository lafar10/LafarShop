@extends('admin.adlay.master_page')


@section('content')
    

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Multi Orders </h1>
</div>

        <div class="container">
            <div class="container">
                <div class="container">
                   
                </div>
                <br>
            <form action="{{route('search.multi.order')}}" class="d-flex">
                <label style="margin-top:5px;" >Search For a Order :</label> &nbsp;<input type="search" name="search_multi_order" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>User_id</td>
                    <td>Price_Total</td>
                    <td>Full Name</td>
                    <td>Phone Number</td>
                    <td>Adresse</td>
                    <td>City</td>
                    <td>Etat</td>
                    <td>Operations</td>
                </tr>
            @foreach($checks as $check)
                <tr>
                    <td>{{$check->id}}</td>
                    <td>{{$check->user_id}}</td>
                    <td>{{$check->price_total}}</td>
                    <td>{{$check->name}}</td>
                    <td>{{$check->phone}}</td>
                    <td>{{$check->adresse}}</td>
                    <td>{{$check->city}}</td>
                    <td>{{$check->etat}}</td>
                    <td>
                        <form action="{{route('delete.multi.order',$check->id)}}" method="post" onsubmit="return confirm('are you sure you to delete this Order ??')" class="d-flex">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$check->id}}" name="check_order_id">
                            <a href="{{route('edit.multi.order',$check->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach    
            </table>
        </div>

@endsection