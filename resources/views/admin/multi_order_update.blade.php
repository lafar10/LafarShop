@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Multi Order </h1>
</div>

    <div class="container">
        <form action="{{route('update.multi.order')}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" value="{{$checks->id}}" name="check_order_id">
             <div class="row g-3">
                 <div class="col-md-6">
                     <label  class="form-label">User ID</label>
                     <input type="text" class="form-control"  value="{{$checks->user_id}}" name="user_id" >
                     @error('user_id')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                 </div>
                 <div class="col-md-6">
                     <label  class="form-label">Total Price</label>
                     <input type="text" class="form-control"  value="{{$checks->price_total}}" name="price_total" >
                     @error('price_total')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                 </div>
                 <div class="col-md-12">
                    <label  class="form-label">Adresse</label>
                    <input type="text" class="form-control"  value="{{$checks->adresse}}" name="adresse" >
                    @error('adresse')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label  class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="{{$checks->name}}" name="name" >
                    @error('name')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label  class="form-label">Number Phone</label>
                    <input type="text" class="form-control" value="{{$checks->phone}}" name="phone" >
                    @error('phone')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label  class="form-label">City</label>
                    <input type="text" class="form-control" value="{{$checks->city}}" name="city" >
                    @error('city')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label  class="form-label">Order Etat</label>
                    <select name="etat" class="form-control" >
                        <option >{{$checks->etat}}</option>
                        <option >on</option>
                        <option >off</option>
                    </select>
                    @error('etat')
                                    <small class="form-text text-danger">
                                        {{$message}}
                                    </small>
                    @enderror
                </div>
                 <div class="col-md-12" align="center">
                    <br>
                     <a  href="{{route('get.admin.check_orders')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                     <button  type="submit"  id="save_cate" class="btn btn-danger" style="border-radius:0%;width:250px;"  >Update Now</button>
                     <br>
                     <br>
                     <br>
                </div>
               </div>
         </form>
    </div>




@stop
