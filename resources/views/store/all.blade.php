@extends('layouts.app')



@section('content')

    <div  align="center">
        <h5 >Result Found : <bold>{{$all->count()}}</bold></h5>
        <hr style="color:red;width:150px;">
        <br>
        <div class="row row-cols-1 row-cols-md-3" >
            @foreach($all as $al)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{asset('products/produits/'.$al->pic)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5>{{$al->title}}</h5>
                            <h4>{{$al->price}} DH</h4>
                            <h6>{{$al->price_promos}} DH</h6>
                            <span>
                                <a href="" >
                                    <i id="bascon" class="far fa-heart"></i>
                                </a>
                            </span>
                        </div>
                            <a href="{{route('get.details',$al->id)}}" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i>  See Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>

@endsection
