@extends('layouts.app')

@section('content')

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token Meta Added -->
  <meta name="csrf-token" content="{{ csrf_token() }}">


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="build.css">



       <div class="top-container">

             <div class="category-name container">
                <div class="row text-center">
                                
                                <a href="{{route('paquote')}}"> <h1>PERSONAL ACCIDENT QUOTATION</h1> </a>
                            
                </div>
            </div>
                      
         </div>

 
<div style="margin-top: 40px; margin-bottom: 20px; background: white">
<div class="container" style="text-align: left;margin-top: 20px">


    <form id="form_quote" name="form_quote" method="get" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  


    <div class="form-group" style="margin-top: 30px">
    <div class="row">
    <div class="col-sm-6">  

      <button type="button" id="btn_addnew" name="btn_addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button>  



    </div>
    </div>
    </div>

    </form>



    <div class="form-group" style="margin-top: 40px">
    <div class="row">

    <div class="col-sm-12">

    <table id="assured_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Assured No.</th>
                <th>Assured Name</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>                 

    </div>

    </div>
    </div>

</div>
</div>

  <script>

  

   $(document).ready( function (){
  
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

    $('#assured_table').DataTable({pageLength: 25,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getassured') }}",
           type: "post",
           columns: [
                    { data: 'id', name: 'id'},
                    { data: 'fullname', name: 'fullname' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
           columnDefs: [{ "width": "100px", "targets": [0] },{ "width": "80px", "targets": [2] }]        
        });

});



  $(document).on('click', '.view_quote', function(){

        //var SITEURL = '{{URL::to('')}}';
        var trans_id =  $(this).attr('id');

        window.location.href = "{{ url('/get-quote/assured-view')}}"+"/"+trans_id;
        

 });

  $(document).on('click', '.add_quote', function(){

        //var SITEURL = '{{URL::to('')}}';
        var trans_id =  $(this).attr('id');

        window.location.href = "{{ url('/get-quote/pa-new')}}"+"/"+trans_id;
        

 });

  $('#btn_addnew').click(function(e){

        window.location.href = "{{ url('/get-quote/assured-new')}}";

});


</script>


@endsection
