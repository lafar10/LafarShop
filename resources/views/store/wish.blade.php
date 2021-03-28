@extends('layouts.app')



@section('content')

        <br>
            <div class="container">
                <h4>My Wish List</h4>
                    <hr style="color:red;width:140px;">
                    <br>
                  
                        <table class="table">
                            <thead class="table-danger">
                                <tr>
                                    <th>Picture</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th> </th>
                                </tr>
                            </thead>
                        @foreach($wishes as $wish)
                            <tbody>
                                    <td><img src="{{asset('/products/produits/'.$wish->products->pic)}}" style="width:120px;height:90px;" alt=""></td>
                                    <td><a href="{{route('get.details',$wish->products->id)}}">{{$wish->products->title}}</a></td>
                                    <td><h5>{{$wish->products->price}} $</h5></td>
                                    <td>
                                        <form action="{{route('delete.wish',$wish->id)}}" class="d-inline" method="post" onsubmit="return confirm('Are You Sure you want to Delete this data')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                            </tbody>
                        @endforeach
                        </table>
            </div>
@endsection
