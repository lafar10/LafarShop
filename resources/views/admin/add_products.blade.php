@extends('admin.adlay.master_page')



@section('content')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add New Product </h1>
        </div>
            <br>

            <div class="container">
                <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="row g-3">
                         <div class="col-md-6">
                             <label  class="form-label">Marque</label>
                             <input type="text" class="form-control" name="marque" id="marque" >
                             @error('marque')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                         </div>
                         <div class="col-md-6">
                             <label  class="form-label">Title</label>
                             <input type="text" class="form-control" name="title"  id="title">
                             @error('title')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                         </div>
                         <div class="col-md-12">
                            <label  class="form-label">Description</label>
                            <input type="text" class="form-control" name="description"  id="description">
                            @error('description')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity"  id="quantity">
                            @error('quantity')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Price</label>
                            <input type="text" class="form-control" name="price"  id="price">
                            @error('price')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Picture</label>
                            <input type="file" class="form-control" name="pic"  id="pic">
                            @error('pic')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Pictures</label>
                            <input type="file" class="form-control" name="pictures"  id="pictures">
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Promotions</label>
                            <input type="text" class="form-control" name="promotions"  id="promotions">
                            @error('promotion')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Price Promos</label>
                            <input type="text" class="form-control" name="price_promos"  id="price_promos">
                            @error('price_promos')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Category ID</label>
                            <input type="text" class="form-control" name="id_cat"  id="id_cat">
                            @error('id_cat')
                            <small class="form-text text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Shipping</label>
                            <input type="text" class="form-control" name="shipping"  id="shipping">
                            @error('shipping')
                                            <small class="form-text text-danger">
                                                {{$message}}
                                            </small>
                            @enderror
                        </div>
                         <div class="col-md-12" align="center">
                            <br>
                             <a  href="{{route('get.products')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                             <button  type="submit"  id="save_cate" class="btn btn-danger" style="border-radius:0%;width:250px;"  >Create Now</button>
                             <br>
                             <br>
                             <br>
                        </div>
                       </div>
                 </form>
            </div>

@endsection
