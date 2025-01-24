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


<input id="strtype" name="strtype" type="hidden" value="{{\Auth::user()->accountType}}">

    <form id="form_quote" name="form_quote" method="get" enctype="multipart/form-data" action="javascript:void(0)">
     {{csrf_field()}}  

    <div class="form-group">
    <div class="row">

    <div class="col-sm-12">
    <div class="btn-group btn-block">
    @foreach($cocogen_pa_quote_sum as $cocogen_sum)
    <button type="button" id="btn_all" name="btn_all" class="btn btn-default"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> All ({{$cocogen_sum->quote_cnt}})</button>
    <button type="button" id="btn_saved" name="btn_saved" class="btn btn-default"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Save ({{$cocogen_sum->quote_save}})</button>
    <button type="button" id="btn_review" name="btn_review" class="btn btn-default"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> For BM Review ({{$cocogen_sum->quote_bmreview}})</button>
    <button type="button" id="btn_submitted" name="btn_submitted" class="btn btn-default"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Submitted ({{$cocogen_sum->quote_submitted}})</button>
    <button type="button" id="btn_salesreview" name="btn_salesreview" class="btn btn-default"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span> For Sales Review ({{$cocogen_sum->quote_salesreview}})</button>
    <button type="button" id="btn_uwreviewed" name="btn_uwreviewed" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-saved" aria-hidden="true"></span> UW Reviewed ({{$cocogen_sum->quote_uwreviewed}})</button>
    <button type="button" id="btn_approved" name="btn_approved" class="btn btn-default"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Approved ({{$cocogen_sum->quote_approved}})</button>
    <button type="button" id="btn_cancelled" name="btn_cancelled" class="btn btn-default"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Cancelled ({{$cocogen_sum->quote_cancelled}})</button>
    @endforeach
  

   </div>
   </div>

    </div>
    </div>
    @if(\Auth::user()->accountType == 'Sales' || \Auth::user()->accountType == 'Agent')
    <div class="form-group" style="margin-top: 30px">
    <div class="row">
    <div class="col-sm-6">  

      <button type="button" id="btn_addnew" name="btn_addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button>  
      <button type="button" id="btn_assured" name="btn_assured" class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Assured Maintenance</button>       

    </div>
    </div>
    </div>
    @endif
    </form>



    <div class="form-group" style="margin-top: 40px">
    <div class="row">

    <div class="col-sm-12">

    <table id="quote_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Quotation No.</th>
                <th>Assured</th>
                <th>Sum Insured</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Date Submitted</th>
                <th>Date Submitted By</th>
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

    $('#quote_table').DataTable({pageLength: 25,
           processing: true,
           serverSide: true,
           ajax: "{{ url('/get-quote/getallpaquote') }}",
           type: "post",
           columns: [
                    { data: 'id', name: 'id'},
                    { data: 'fullname', name: 'fullname' },
                    { data: 'sum_insured', name: 'sum_insured', render: $.fn.dataTable.render.number( ',', '.', 2 ) },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'dt_submitted', name: 'dt_submitted' },
                    { data: 'submitted_name', name: 'submitted_name' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
           columnDefs: [{ "width": "80px", "targets": [7] }]        
        });


    var str_type = $("input[name='strtype']").val();
    oTable = $('#quote_table').DataTable();


  if (str_type == "Approver")
  {

       var srchtext = "UW Reviewed";
      oTable.search(srchtext).draw() ;

  }
  else if (str_type == "Underwriter"){

       var srchtext = "Submitted";
      oTable.search(srchtext).draw() ;
  }
  else if (str_type == "Manager"){

       var srchtext = "For BM Review";
      oTable.search(srchtext).draw() ;
  }  
  else
  {

       var srchtext = "";
      oTable.search(srchtext).draw() ;
  }

});


   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#btn_submitted').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "Submitted";
      oTable.search(srchtext).draw() ;
});

$('#btn_all').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "";
      oTable.search(srchtext).draw() ;

});

$('#btn_saved').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "Save";
      oTable.search(srchtext).draw() ;

});

$('#btn_salesreview').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "For Sales Review";
      oTable.search(srchtext).draw() ;

});

$('#btn_uwreviewed').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "UW Reviewed";
      oTable.search(srchtext).draw() ;

});

$('#btn_approved').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "Approved";
      oTable.search(srchtext).draw() ;

});

$('#btn_cancelled').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "Cancelled";
      oTable.search(srchtext).draw() ;

});

$('#btn_review').click(function(e){

   oTable = $('#quote_table').DataTable();
   e.preventDefault();

   var srchtext = "For BM Review";
      oTable.search(srchtext).draw() ;

});

  $(document).on('click', '.view_quote', function(){

        //var SITEURL = '{{URL::to('')}}';
        var trans_id =  $(this).attr('id');

        window.location.href = "{{ url('/get-quote/pa-quoteview')}}"+"/"+trans_id;
        

 });

  $('#btn_addnew').click(function(e){


        window.location.href = "{{ url('/get-quote/assured-home')}}";

});

  $('#btn_assured').click(function(e){


        window.location.href = "{{ url('/get-quote/assured-home')}}";

});  


</script>


@endsection
