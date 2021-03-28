@extends('layouts.app')

@section('content')


        <div class="container">
            <h4>My Acount</h4>
                    <hr style="color:red;width:120px;">
            <br>

                    <form action="{{ route('update.Acount',Auth::id()) }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label  class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" placeholder="Enter Your Full Name" name="name" id="name" >
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{$user->email}}" placeholder="Enter Your Adress Email" name="email"  id="email">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Phone Number</label>
                                <input type="text" class="form-control" value="{{$user->phone}}" name="phone"  id="phone" placeholder="(+212) 621458695">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Age</label>
                                <input type="text" class="form-control" value="{{$user->age}}" name="age" id="age" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Gender</label>
                                <select class="form-select" name="gender">
                                    <option selected>Choose your Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                  </select>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">City</label>
                                <input type="text" class="form-control" value="{{$user->city}}" name="city" id="city" placeholder="CasaBlanca">
                            </div>
                            <div class="col-md-12">
                                <label  class="form-label">Adresse</label>
                                <input type="text" class="form-control" value="{{$user->adresse}}" name="adresse" id="adresse" placeholder="1234 Main St">
                            </div>
                            <div class="col-md-12" align="center">
                                <br>
                                <button type="submit" style="width:280px;"  id="cd" class="btn btn-danger"><i class="fas fa-paper-plane"></i> Submit</button>
                            </div>
                        </div>
                    </form>
        </div>
        <br>
        <br>
        <br>
@endsection
