<link href="{{ asset('datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/js/dataTables.bootstrap.min.js') }}"></script>


<style type="text/css">
   .dataTables_filter {
   float: left !important;
} 
.dataTables_length{
    float:right !important;
}
.dataTables_info{
    float:right !important;
}

.dataTables_paginate {
  text-align: center !important;
  padding-right: 300px !important;
}

#header{
  background-color:#188c8c;
  color:white; 
  text-transform: capitalize;
}

#header2{
  background-color:#e4509a;
  color:white; 
  text-transform: capitalize;
}
#cancelButton{
    background: none;
    border: none;
    margin: 0;
    padding: 0;
    color: black;
    text-decoration: underline;
}
#resendMail{
   font-family:    Muli !important ;
   border: none;
   padding: 0;
   background: none;
    color:#ffa310;
}

.modal-dialog {
  height: 100vh !important;
  display: flex;
}

.modal-content {
  margin: auto !important;
  height: fit-content !important;
}
.dataTables_filter {
   width: 100%;
   float: right;
   text-align: right;
}
</style>
       <div class="pull-left"><label style="color: #188c8c;font-size: 20px;">Transactions</label></div>
        @if($errors->any())
        <h4>{{$errors->first()}}</h4>
        @endif
        <table class="table data-table display" id='example'  style="width:100%">
            <thead>
                <tr>
                    <th id='header'>Computer Shop Name</th>
                    <th id='header'>Card number</th>
                    <th id='header'>Product Type</th>
                    <th id='header'>Insured Email Address</th>
                    <th id='header'>Transaction Date</th>
                    <th id='header'>Action</th>
                </tr>
            </thead>
        </table>
        <div class="col-md-12 break-two"><br></div>  
        <div class="col-md-12 break-two"><br></div>  
        <div class="col-md-12 break-two"><br></div>
        
    <div class="pull-left"><label style="color: #e4509a;font-size: 20px;">Client</label></div>
        <table class="table  data-client display" id='clientExample'  style="width:100%">
            <thead>
                <tr>
                    <th id='header2'>Product Type</th>
                    <th id='header2'>Card Number</th>
                    <th id='header2'>Registration Date</th>
                    <th id='header2'>Details</th>
                    <th id='header2' class='testing'>Status</th>
                </tr>
            </thead>

        </table>
        <div class="col-md-12 break-two"><br></div>  
        <div class="col-md-12 break-two"><br></div>  
        <div class="col-md-12 break-two"><br></div>
 
<div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="formedit" method="POST"  enctype="multipart/form-data">
                @csrf 
          <div class="modal-body">
            <p>Are you sure you wan to cancel this transaction?</p>
            
            <input type="hidden" name="cancelId" id='cancelId' class='cancelId'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" id='submit' class="btn btn-primary submit" value='Ok'></input>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <form id="sendmail" method="POST"  enctype="multipart/form-data">
                @csrf 
          <div class="modal-body">
            <p>Are you sure you want to resend Email </p>
            
        <!--        <div id='loadingresend' style="text-align: center;">
                <img src="{{ URL('/images/test.gif')}}" width='200px' height='200px' alt="Cocogen">
              </div>
 -->              <input type="hidden" name="resendemail" value=""/>
            </div>
             </div>
         <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id='cancel1' data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn-md load1" id="load1" value='Ok'></input>
            </div>
             </form>

    </div>
  </div>
</div>
                            
<script type="text/javascript">
 jQuery(document).ready(function($) {
    $.fn.dataTable.ext.errMode = 'none';
    var table = jQuery('.data-table').DataTable({
        dom: '<"bottom"fl>rt<"top text-center"ip><"clear">',
        processing: true,
         serverSide: true,
        bLengthChange: false,
         searching: true,
         aaSorting: [[ 5, 'desc' ]],
         ajax:{
          url: "{{ route('protechExpand.protechReportAjax') }}",
        },
        columns: [
              {data: 'fullName', name: 'fullName'},
              {data: 'code', name: 'code'},
              {data: 'typeOfPackage', render: function(data, type, row){
            if(row.typeOfPackage=='0'){
                return '<span style="font-weight: bold;"> DESKTOP </span>'; 
              }else{
                return '<span style="font-weight: bold;"> LAPTOP </span>'; 
              }
      
          }},
              {data: 'emailAddress', name: 'emailAddress'},
              {data: 'created_at',   render: function (data, type, row, meta) {
                  return moment.utc(data).local().format('YYYY-M-DD');
              }},
               {data: 'action', name: 'action'},
        ],
         fixedColumns: true
    });
    setInterval( function () {
          table.ajax.reload();
    }, 20000 );

  });

</script>
<script type="text/javascript">
 jQuery(document).ready(function($) {
         $.fn.dataTable.ext.errMode = 'none';
        var table2 = jQuery('.data-client').DataTable({
        dom: '<"bottom"fl>rt<"top text-center"ip><"clear">',
        processing: true,
        serverSide: true,
        bLengthChange: false,
        searching: true,
        aaSorting: [[3, 'desc']],
        ajax:{
          url: "{{ route('protechExpand.clientreport') }}",
        },
        columns: [
                {data: 'typeOfPackage', render: function(data, type, row){
                    if(row.typeOfPackage=='0'){
                        return '<span style="font-weight: bold;"> DESKTOP </span>'; 
                    }else{
                        return '<span style="font-weight: bold;"> LAPTOP </span>'; 
                    }

                }},
              {data: 'code', name: 'code'},
           {data: 'created_at',   render: function (data, type, row, meta) {
                  return moment.utc(data).local().format('YYYY-M-DD');
              }},
             
               {data: 'status2',render:function(data, type, row){
                       if(row.status2=='0' ) {
                        return "<a href='{{ url('protechexpand-report/protechDetails')}}"+'/'+ row.gid +"' style='text-decoration:none;' target='_blank'>View Details</a>";
                      
                     }else{
                       return "<span style='text-decoration:none;'>View Details</span>";
                     }
                   }},
             {data: 'status', name: 'status'},
            
        ],
         fixedColumns: true

    });
        setInterval( function () {
              table2.ajax.reload();
        }, 20000 );
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    //AJAX FOR CANCELLING THE DETAILS
   $.fn.dataTable.ext.errMode = 'none';

   $('#my_modal2').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="cancelId"]').val(bookId);
  });
  jQuery('#formedit').submit(function(e) {
  e.preventDefault();
      let formData = new FormData(this);
      $.ajax({
        type:'POST',
        url: "{{ route('protechExpand.cancelItem') }}",
        data: formData,
        contentType: false,
        processData: false,

        success: (response) => {
          current = 0;
          jQuery('#my_modal2').modal('hide');

        },
        error: function(response){
          console.log(response);
        }
      });
});
  });
</script>
 
 <script type="text/javascript">
jQuery(document).ready(function($) {
  // AJAX FOR RESENDING EMAIL
  $('#my_modal').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="resendemail"]').val(bookId);
  });

        jQuery('#loadingresend').hide();
        jQuery('#sendmail').submit(function(e) {
        e.preventDefault();
        jQuery('#loadingresend').show();

        jQuery('#load1').hide();
        jQuery('#cancel1').hide();
            
        let formData = new FormData(this);
        $.ajax({
          type:'POST',
            url: "{{ route('protechExpand.resendEmail') }}",
          data: formData,
          contentType: false,
          processData: false,

          success: (response) => {
            current = 0;

          jQuery('#loadingresend').hide();
          jQuery('#my_modal').modal('hide');
          jQuery('#load1').show();
          jQuery('#cancel1').show();
         
          },
          error: function(response){
            // console.log(response);
          }
        });
      });
    });
 
 </script>