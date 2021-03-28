@extends('admin.adlay.master_page')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<br>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#d63031;"><i class="far fa-file"></i> Orders</h5>
                        <h1><span class="badge rounded-pill bg-danger">{{App\Order::where('etat','off')->get()->count()}}</span></h1>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><a href="{{ route('Check-Single-Order') }}"><h5>Check From Here...</h5></a></small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#d63031;"><i class="far fa-copy"></i> Multi Orders</h5>
                        <h1><span class="badge rounded-pill bg-danger">{{App\Check::where('etat','off')->get()->count()}}</span></h1>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><a href="{{route('check.multi.order')}}"><h5>Check From Here...</h5></a></small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#d63031;"><i class="fas fa-users"></i> Users</h5>
                        <h1><span class="badge rounded-pill bg-danger">{{App\User::all()->count()}}</span></h1>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><a href="{{route('get.admin.users')}}"><h5>Check From Here...</h5></a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
