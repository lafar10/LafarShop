@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products </h1>
</div>

        <div class="container">
          
            <br>
            <form action="{{route('search.product')}}" method="GET" class="d-flex">
                @csrf
                <label style="margin-top:5px;" >Search For a Product :</label> &nbsp;<input type="search" name="search_product" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button type="submit" class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>&nbsp;&nbsp;
                <a href="{{route('get.store.product')}}" class="btn btn-outline-success" style="width:200px;" >Create Category</a>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Marque</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Pic</td>
                    <td>Pictures</td>
                    <td>Promotions</td>
                    <td>Price_Promo</td>
                    <td>Id_Category</td>
                    <td>Shipping</td>
                    <td>Operations</td>
                </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->marque}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td><img src="{{asset('products/produits/'.$product->pic)}}" style="width:60px;height:50px;" alt=""></td>
                    <td>{{$product->pictures}}</td>
                    <td>{{$product->promotion}}</td>
                    <td>{{$product->price_promos}}</td>
                    <td>{{$product->id_cat}}</td>
                    <td>{{$product->shipping}}</td>
                    <td>
                        <form action="{{route('delete.product',$product->id)}}" method="post" class="d-flex" onsubmit="return confirm('Are You Sure ??')">
                            @csrf
                            <a href="{{route('edit.product',$product->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

@endsection
