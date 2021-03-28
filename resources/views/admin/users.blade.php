@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users </h1>
</div>

        <div class="container">
            <div class="container">
               
                <br>
            <form action="{{route('search.user')}}" method="GET" class="d-flex">
                @csrf
                <label style="margin-top:5px;" >Search For a User :</label>&nbsp; <input type="search" name="search_user" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button class="btn btn-outline-success" style="width:50px;" ><i class="fas fa-search"></i></button>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>PassWord</td>
                    <td>Adress</td>
                    <td>City</td>
                    <td>Phone</td>
                    <td>Age</td>
                    <td>Gender</td>
                    <td>User_Type</td>
                    <td>Operations</td>
                </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->adresse}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->usertype}}</td>
                    <td>
                        <form action="{{route('delete.user')}}" method="post" class="d-flex" onsubmit="return confirm('Are You Sure ??')">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <a href="{{route('edit.user',$user->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

@endsection
