@extends('admin.adlay.master_page')



@section('content')


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add New Category </h1>
        </div>
                <br>
                <br>
        <div class="container">
            <form action="{{route('update.categorie')}}" method="POST">
               {{csrf_field()}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label  class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="categorie_name" value="{{$categories->categorie_name}}" >
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label">Icon Class</label>
                        <input type="text" class="form-control" name="icon"  value="{{$categories->icon}}">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12" align="center">
                        <input type="hidden" name="categorie_id" value="{{$categories->id}}">
                        <a  href="{{route('get.admin.categories')}}" class="btn btn-outline-danger" style="border-radius:0%;width:250px;" >Cancel</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button  type="submit"  id="save_cate" class="btn btn-danger" style="border-radius:0%;width:250px;"  >Update Now</button>
                    </div>
                  </div>
            </form>
        </div>

@endsection

@section('scripts')

        <script>
           /* $(document).on('click','#save_cate',function(e){

                e.preventDefault();

                $('#save_cate').html('Sending..');

                $.ajax({

                    type : "post",
                    url: "{{route('store.cate')}}",
                    data : {
                        "_token" : "{{ csrf_token() }}",
                        "categorie_name" : $("input[name='categorie_name']").val(),
                        "icon" : $("input[name='icon']").val(),
                    },
                    success: function( data ) {

                        }
                });
                $('#save_cate').html('Create Now');
            });*/

        </script>

@endsection
