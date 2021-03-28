@extends('layouts.app')



@section('content')
<br>

               <div class="container" id="detailscard" style="margin-left:15px;">
                     <div class="row"  >
                        <br>
                            <div class="col" >
                                    <br>
                                        <img src="{{asset('products/produits/'.$details->pic)}}" style="width:320px;height:260px;" alt="">
                                        <br>
                            </div>
                            <div class="col" style="margin-bottom:5px;margin-right:35px;">
                                    <br>
                                        <h1>
                                                    {{$details->marque}}
                                        </h1>
                                        <p>
                                                    {{$details->title}}.
                                        </p>
                                        <h3>
                                                    {{$details->price}} $
                                        </h3>
                                        <form action="{{route('Save.cart')}}" method="POST" class="d-inline">
                                            @csrf
                                            <span class="d-inline">Quantity :<input type="number" class="form-control" name="quantity" id="quantity" value="1"  style="width:70px;" ></span>
                                            <br>
                                            <input type="hidden" name="product_id" id="product_id" value="{{$details->id}}">
                                            <input type="hidden" name="price" id="price" value="{{$details->price}}">
                                            <input type="hidden" name="shipping" id="shipping" value="{{$details->shipping}}">
                                            <button type="submit" id="cd" style="width:130px;"   class="add-cart btn btn-danger"><i class="fas fa-cart-plus"></i> Add To Cart</button>&nbsp;&nbsp;&nbsp;
                                            <a href="{{route('order.index',$details->id)}}" id="cd" style="width:130px;"   class="btn btn-danger"><i class="far fa-credit-card"></i> Order Now</a>&nbsp;&nbsp;
                                        </form>
                                        <form action="{{route('add.wish')}}" method="POST" class="d-inline" >

                                             {{ csrf_field()}}
                                            <input type="hidden" name="product_id" id="product_id" value="{{$details->id}}">
                                            <button class="btn btn-danger" id="wish" type="submit">
                                                <i  class="far fa-heart"></i>
                                            </button>
                                        </form>
                                <br>
                                <br>
                            </div>
                            <div class="col">
                                <br>
                                <h5>Shipping Price</h5>
                                <hr style="color:red;width:120px;">
                                <h5>Shipping : {{$details->shipping}} $</h5>
                                <h5>Shipping time : 3 Days</h5>
                                <br>
                                <h5>Comments & Reviews</h5>
                                <hr style="color:red;width:140px;">
                                <h5><i class="fas fa-comment-dots" style="color:red;"></i> Comments : ({{App\Review::where('product_id', '=', $details->id)->get()->count()}}).</h5>
                                <h5><i class="fas fa-star" style="color:#fdcb6e;" ></i> Reviews : ({{App\Review::where('product_id', '=', $details->id)->get()->count()}}).</h5>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <h2>See More</h2>
                    <hr style="height:4px;color:red;width:150px;">
                    <br>
                    <br>
                            <div class="container">
                                <div class="row row-cols-1 row-cols-md-3" >
                                    @foreach($promotions as $promotion)
                                        <div class="col mb-4">
                                            <div class="card">
                                                <img src="{{asset('products/produits/'.$promotion->pic)}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5>{{$promotion->title}}</h5>
                                                    <h4>{{$promotion->price}} DH</h4>
                                                    <h6>{{$promotion->price_promos}} DH</h6>
                                                    <span><a href="" >
                                                        <i id="bascon" class="far fa-heart"></i>
                                                    </a></span>
                                                </div>
                                                <a href="{{route('get.details',$promotion->id)}}" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i>  See Details</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                    <br>

                    <br>
                    <br>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-info-circle"></i> Details</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-comment-dots"></i> Comments</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-star-half-alt"></i> Reviews</a>
                </li>

            </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <div class="container">

                        {{$details->description}}
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>
                    <div class="container">
                        <div class="row">
                            @foreach($comments as $comment)
                                <div class="col-12">
                                    <b>{{$comment->users->name}}</b>
                                    <p>{{$comment->created_at}}</p>
                                    <p>{{$comment->comments}}</p>
                               </div>
                               <hr style="color:red;height:0.5px;">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <br>
                    <br>
                    <div  class="container" style="margin-left: 70px;margin-top: 5px;">
                            <div >
                                <h3>Ratings and Reviews</h3>
                                <hr style="color:red;width:235px;">
                                <div >
                                    <span class="display-5 font-weight-bolder">{{App\Review::where('product_id','=',$details->id)->avg('value')}}/5 <i class="fas fa-star" style="color:#fdcb6e;" ></i></span><br>
                                    <span class="text-black-50">Reviews({{App\Review::where('product_id','=',$details->id)->get()->count()}})</span>
                                </div>
                            </div>
                     <div class="flex-grow-1">
                        <div class="row">
                            <div class="col-6 text-left">
                                <strong>5</strong> ({{App\Review::where('value','=',5)->where('product_id','=',$details->id)->get()->count()}}) <i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6  text-left">
                                <strong>4</strong> ({{App\Review::where('value','=',4)->where('product_id','=',$details->id)->get()->count()}}) <i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6  text-left">
                                <strong>3</strong> ({{App\Review::where('value','=',3)->where('product_id','=',$details->id)->get()->count()}}) <i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-6  text-left">
                                    <strong>2</strong> ({{App\Review::where('value','=',2)->where('product_id','=',$details->id)->get()->count()}}) <i class="fas fa-star" style="color:#fdcb6e;" ></i><i class="fas fa-star" style="color:#fdcb6e;" ></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left">
                                <strong>1</strong> ({{App\Review::where('value','=',1)->where('product_id','=',$details->id)->get()->count()}}) <i class="fas fa-star" style="color:#fdcb6e;" ></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
<br>
<br>
<br>
<br>
@endsection


