@extends('layouts.app')


@section('content')

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="sliders/b.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="sliders/ww.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="sliders/a.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
            </div>
        <br>
        <br>
        <br>
        <br>
            <h1>New Arrivals</h1>
            <hr style="height:4px;color:red;width:210px;">
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
                                    <a href="" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i>  See Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <br>
                <div align="center">
                        <a href=""  style="width:250px;"   class="btn btn-danger"><i class="far fa-eye"></i> See More Arrivals...</a>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col" style="margin-top:55px;">
                          <h1>Last Model Of T-Shirt</h1>
                          <p>
                            Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                          </p>
                          <a href="" id="cd" style="width:250px;"   class="btn btn-danger"><i class="far fa-eye"></i> See More Arrivals...</a>
                        </div>
                        <div class="col">
                          <img src="sliders/ww.jpg" style="width:500px;height:320px;" alt="">
                        </div>
                      </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="sliders/a.jpg" style="width:500px;height:320px;" alt="">
                          </div>
                        <div class="col" style="margin-top:55px;">
                          <h1>Last Model Of T-Shirt</h1>
                          <p>
                            Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                          </p>
                          <a href="" id="cd" style="width:200px;"   class="btn btn-danger"><i class="far fa-eye"></i> See More Arrivals...</a>
                        </div>
                      </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="sliders/a.jpg" style="width:500px;height:320px;" alt="">
                          </div>
                        <div class="col" style="margin-top:55px;">
                          <h1>Last Model Of T-Shirt</h1>
                          <p>
                            Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.
                          </p>
                          <a href="" id="cd" style="width:200px;"   class="btn btn-danger"><i class="far fa-eye"></i> See More Arrivals...</a>
                        </div>
                      </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            <div align="center">
                <h1>Popular Items</h1>
                <hr style="height:4px;color:red;width:220px;">
            </div>
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-3" >
                        @foreach($items as $item)
                            <div class="col mb-4">
                                <div class="card">
                                    <img src="{{asset('products/produits/'.$item->pic)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5>{{$item->title}}</h5>
                                        <h4>{{$item->price}} DH</h4>
                                        <h6>{{$item->price_promos}} DH</h6>
                                        <span><a href="" >
                                            <i id="bascon" class="far fa-heart"></i>
                                        </a></span>
                                    </div>
                                    <a href="" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i>  See Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <br>
                <br>
                <div align="center">
                        <a href="" id="cd" style="width:250px;"   class="btn btn-danger"><i class="far fa-eye"></i> See More Products...</a>
                </div>
                <br>
                <br>
                <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Women Fashion</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Men Fashion</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Electronics</a>
                    </li>

                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-3" >
                                @foreach($womens as $women)
                                    <div class="col mb-4">
                                        <div class="card">
                                            <img src="{{asset('products/produits/'.$women->pic)}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5>{{$women->title}}</h5>
                                                <h4>{{$women->price}} DH</h4>
                                                <h6>{{$women->price_promos}} DH</h6>
                                                <span><a href="" >
                                                    <i id="bascon" class="far fa-heart"></i>
                                                </a></span>
                                            </div>
                                            <a href="" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i> See Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-3" >
                                @foreach($mens as $men)
                                    <div class="col mb-4">
                                        <div class="card">
                                            <img src="{{asset('products/produits/'.$men->pic)}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5>{{$men->title}}</h5>
                                                <h4>{{$men->price}} DH</h4>
                                                <h6>{{$men->price_promos}} DH</h6>
                                                <span><a href="" >
                                                    <i id="bascon" class="far fa-heart"></i>
                                                </a></span>
                                            </div>
                                            <a href="" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i> See Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-3" >
                                @foreach($electronics as $electronic)
                                    <div class="col mb-4">
                                        <div class="card">
                                            <img src="{{asset('products/produits/'.$electronic->pic)}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5>{{$electronic->title}}</h5>
                                                <h4>{{$electronic->price}} DH</h4>
                                                <h6>{{$electronic->price_promos}} DH</h6>
                                                <span><a href="" >
                                                    <i id="bascon" class="far fa-heart"></i>
                                                </a></span>
                                            </div>
                                            <a href="" id="cartadd" class="btn btn-danger"><i class="far fa-eye"></i> See Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                  </div>
                <br>
                <br>
                <br>
                <hr style="height:4px;color:red;width:1070px;">
                <div class='container-fluid mx-auto mt-5 mb-5 col-12' style="text-align: center;border-width:2px;">
                    <h1 align="center">Our Services</h1>
                    <div class="hd">Why People Believe in Us</div>
                        <p><small class="text-muted">Always render more and better service than <br />is expected of you, no matter what your ask may be.</small></p>
                            <div class="row" style="justify-content: center">
                                <div id="services" class="card col-md-3 col-12">
                                    <div class="card-content">
                                        <div class="card-body"> <img class="img" style="width:100px;height:100px;" src="https://image.flaticon.com/icons/png/128/411/411712.png" />
                                            <div class="shadow"></div>
                                                <div class="card-title"> Fast Shipping </div>
                                                    <div class="card-subtitle">
                                                        <p> <small class="text-muted">With sites in 5 languages, we ship to over 200 countries & regions. </small> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <div id="services"  class="card col-md-3 col-12 ml-2">
                                    <div class="card-content">
                                        <div class="card-body"> <img class="img" style="width:100px;height:100px;" src="sliders/cash-on-delivery.png" />
                                <br>
                                            <div class="card-title"> Cash On Delivery </div>
                                                <div class="card-subtitle">
                                                    <p> <small class="text-muted"> Our Buyer Protection covers your purchase from click to delivery,Cash On Delivery.</small> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div id="services"  class="card col-md-3 col-12 ml-2">
                                    <div class="card-content">
                                        <div class="card-body"> <img class="img rck" style="width:100px;height:100px;" src="sliders/24-hours.png" />
                               <br>
                                            <div class="card-title"> We Help you 24/7</div>
                                                <div class="card-subtitle">
                                                    <p> <small class="text-muted">  Round-the-clock assistance for a smooth shopping experience.</small> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <hr style="height:4px;color:red;width:1070px;">

@endsection
