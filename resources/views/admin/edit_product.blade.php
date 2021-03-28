@extends('admin.adlay.master_page')



@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Update Product </h1>
        </div>
            <br>

            <div class="container">
                <form action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="product_id" name="product_id" value="{{$products->id}}">
                      <div class="row g-3">
                         <div class="col-md-6">
                             <label  class="form-label">Marque</label>
                             <input type="text" class="form-control" value="{{$products->marque}}" name="marque" id="marque" >
                             @error('marque')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                         </div>
                         <div class="col-md-6">
                             <label  class="form-label">Title</label>
                             <input type="text" class="form-control" value="{{$products->title}}" name="title"  id="title">
                             @error('title')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                         </div>
                         <div class="col-md-12">
                            <label  class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{$products->description}}" name="description"  id="description">
                            @error('description')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Quantity</label>
                            <input type="text" class="form-control" value="{{$products->quantity}}" name="quantity"  id="quantity">
                            @error('quantity')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Price</label>
                            <input type="text" class="form-control" value="{{$products->price}}" name="price"  id="price">
                            @error('price')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Picture</label>
                            <input type="file"  name="pic" value="{{$products->pic}}" >
                            @error('pic')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Pictures</label>
                            <input type="file" class="form-control" value="{{$products->pictures}}" name="pictures"  id="pictures">
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Promotions</label>
                            <input type="text" class="form-control" value="{{$products->promotion}}" name="promotions"  id="promotions">
                            @error('promotion')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Price Promos</label>
                            <input type="text" class="form-control" value="{{$products->price_promos}}" name="price_promos"  id="price_promos">
                            @error('price_promos')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Category ID</label>
                            <input type="text" class="form-control" value="{{$products->id_cat}}" name="id_cat"  id="id_cat">
                            @error('id_cat')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Shipping</label>
                            <input type="text" class="form-control" value="{{$products->shipping}}" name="shipping"  id="shipping">
                            @error('shipping')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                         <div class="col-md-12" align="center">
                            <br>
                             <a  href="{{route('get.products')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                             <button  type="submit"  id="save_prod" class="btn btn-danger" style="border-radius:0%;width:250px;"  >Update Now</button>
                             <br>
                             <br>
                             <br>
                        </div>
                       </div>
                 </form>
            </div>

@endsection


@section('scripts')

    <script>
            /*$(document).on('click','#save_prod',function(e){


                e.preventDefault();

                $('#save_prod').html('Sending..');


                $.ajax({
                    url : "{{route('update.product')}}",
                    type : "post",
                    enctype : "multipar/form-data",
                    data :{
                        "_token" : "{{ csrf_token() }}",
                        "marque" : $("input[name='marque']").val(),
                        "title": $("input[name='title']").val(),
                        "description": $("input[name='description']").val(),
                        "quantity": $("input[name='quantity']").val(),
                        "price": $("input[name='price']").val(),
                        "pic": $("input[name='pic']").val(),
                        "promotion": $("input[name='promotions']").val(),
                        "price_promos": $("input[name='price_promos']").val(),
                        "id_cat": $("input[name='id_cat']").val(),
                        "shipping": $("input[name='shipping']").val(),
                    },
                    success: function(data) {

                    }, error: function (reject){

                    }
                });

            });*/
    </script>

@endsection
