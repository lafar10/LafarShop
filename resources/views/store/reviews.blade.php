@extends('layouts.app')


@section('content')

<div class="container" style="border-color:red;border:solid red;border-width:1px;width:380px;">
    <div align="center" >
        <form action="{{route('review.store')}}"  method="post">
            <input type="hidden" id="product_id" name="product_id" value="{{$carts->products->id}}" >
                @csrf
                <br>
                <h3 >Reward Our Product</h3>
                <hr style="color:red;width:262px;" >

                <i style="color:#f1c40f;" class="fas fa-star"></i><i style="color:#f1c40f;" class="fas fa-star"></i><i style="color:#f1c40f;" class="fas fa-star"></i><i style="color:#f1c40f;" class="fas fa-star"></i><i style="color:#f1c40f;" class="fas fa-star"></i>

                <select name="star" style="width:150px;" class="custom-select">
                    @for ($i = 1; $i <= 5 ; $i++)
                        <option value="{{$i}}" >{{$i}}</option>
                    @endfor
                </select>
                <br>
                <br>
                <textarea class="form-control" name="comments" placeholder="Write a Comment Here..." style="width:250px;" rows="3"></textarea>
                <br>
                <button type="submit" class="btn btn-outline-danger" style="border-radius:0%;width:150px;" ><i class="fas fa-paper-plane"></i> Submit</button>

            </form>
            <br>
    </div>
</div>
@endsection
