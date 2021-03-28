@extends('admin.adlay.master_page')



@section('content')


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">User Update </h1>
        </div>
                <br>
                <br>
                <div class="container">
                    <form action="{{route('update.user')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$users->id}}">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label  class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="{{$users->name}}" placeholder="Enter Your Full Name" name="name" id="name" >
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{$users->email}}" placeholder="Enter Your Adress Email" name="email"  id="email">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Phone Number</label>
                                <input type="text" class="form-control" value="{{$users->phone}}" name="phone"  id="phone" placeholder="(+212) 621458695">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Age</label>
                                <input type="text" class="form-control" value="{{$users->age}}" name="age" id="age" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">City</label>
                                <input type="text" class="form-control" value="{{$users->city}}" name="city" id="city" placeholder="CasaBlanca">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Adresse</label>
                                <input type="text" class="form-control" value="{{$users->adresse}}" name="adresse" id="adresse" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Gender</label>
                                <select class="form-select" name="gender">
                                    <option selected>{{$users->gender}}</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">User Type</label>
                                <select class="form-select" name="type">
                                    <option selected>{{$users->usertype}}</option>
                                    <option>user</option>
                                    <option>admin</option>
                                  </select>
                            </div>
                            <div class="col-md-12" align="center">
                                <br>
                                <a  href="{{route('get.admin.users')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" style="width:280px;"  id="cd" class="btn btn-danger">Update Now</button>
                            </div>
                        </div>
                    </form>
                </div>
@stop
