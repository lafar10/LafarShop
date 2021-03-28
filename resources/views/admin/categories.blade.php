@extends('admin.adlay.master_page')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories </h1>
</div>

        <div class="container">
            <div class="container">
             
                <br>
            <form action="{{route('search.categorie')}}" method="get" class="d-flex">
                @csrf
                <label style="margin-top:5px;" >Search For a Category :</label> &nbsp;<input type="search" name="search_category" class="form-control" style="width:200px;">&nbsp;&nbsp;
                <button class="btn btn-outline-primary" style="width:50px;" ><i class="fas fa-search"></i></button>&nbsp;&nbsp;
                <a href="{{route('get.store.cate')}}" class="btn btn-outline-success" style="width:200px;" >Create Category</a>
            </form>
            <br>
            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Category Name</td>
                    <td>Icons</td>
                    <td>Operations</td>
                </tr>
            @foreach($categories as $categorie)
                <tr>
                    <td>{{$categorie->id}}</td>
                    <td>{{$categorie->categorie_name}}</td>
                    <td>{{$categorie->icon}}</td>
                    <td>
                        <form action="{{route('delete.categorie')}}" method="POST" onsubmit="return confirm('are you Sure??')" class="d-flex">
                            @csrf
                            <input type="hidden" name="categorie_id" value="{{$categorie->id}}">
                            <a href="{{route('edit.categorie',$categorie->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>&nbsp;
                            <button type="submit" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>

@endsection
