    <style type="text/css">
      #packageButton{
        height: 127px;
        width: 205px;
        border:0;
        font-size: 10px !important;
      }
      #rightMargin{
        padding-right: 20px
      }
      #packageButton:hover{
        background-color:#99c1c1; 
        color:white;
        

      }
      #typeHeader{
        font-weight: bold;
        font-size:20px;
        text-align: center;
      }
      #packageButton.active {
       background-color:#006565; 
       color:white;
     }

   /*  #emailSuccess {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);

    }*/
    .modal-header {
      background-color: #008080 !important;
      height: 0px !important;
    }
    #loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 10px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
      margin:auto;
      margin-top: 100px;
      margin-bottom: 100px;
    }   


    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
<div id='hidepage'>
  <div class="category-name container" style="text-align: left;background-color: white;">
                <div class="col-md-4 ">
                    <h1>
                      PRO-TECH EXPAND
                    </h1>
                </div>
            </div>
              <div class="container" style="text-align: left;background-color: white;font-size: 18px;font-weight: bold;">
                <div class="col-md-4">
                      Client Registration
                </div>
            </div>
        <div class="main-container col1-layout" style=";background-color: white;">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Client Registration</h1>
                    </div>
                    <div class="product-inquiry-form mega-form-builds" style="font-family: muli;line-height: ">
                      <form method="post"  enctype="multipart/form-data" id='submitForm' novalidate>
                        {{ csrf_field() }}

                            <div id="emailadd" class="col-md-4 {{ $errors->has('email_personal_info') ? ' has-error' : '' }}">
                                <label for="email_personal_info">Client's email Address</label> 
                                 <input name="email_personal_info" id="email_personal_info" type="text" class="form-control input-lg personal_ifno_mobile" maxlength="100" style="border-color: rgb(75, 181, 67);" required="required">
                                 @if ($errors->has('email_personal_info'))
                                    <span class="help-block" style="margin-top: -12px;">
                                        <strong>{{ $errors->first('email_personal_info') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="typeselected"id='typeselected'>
                            <input type="hidden" name="resend"id='resend'>
                            <div class="clearfix">   </div>
                            <div class="break-one"></div>   
                            <div class="clearfix"> </div>
                            <label style="padding-left:20px"> Type of Package</label>
                              <div class="clearfix">   </div>
                            <div class="break-one"></div>   
                            <div class="clearfix"> </div>
                            <div class='col-md-12' style="overflow-x:auto;">
                            <table class='table'>
                                  <tr>
                                     <td id='rightMargin'>  
                                        <label> Desktop</label> 
                                        <div class="break-one"></div>                                       
                                         <button type="button"  class='input-lg col-md-4 desktop packageButton' id='packageButton' class='desktop'><span id='typeHeader'>EXTRA</span><br>Max. Coverage: Php 60,000</span><br>Amount: Php 1,000</button>
                                     </td>
                                      <td id='rightMargin'>
                                         <label> Laptop</label> 
                                         <div class="break-one"></div>                                       
                                             <button  type="button" class='input-lg col-md-4 laptop packageButton' id='packageButton'><span id='typeHeader'>LITE</span><br> Max. Coverage: Php 50,000</span><br>Amount: Php 1,500</button>
                                     </td>
                                    <td id='rightMargin'>
                                        <label> </label> 
                                         <div class="break-one"></div>                                       
                                             <button  type="button" class='input-lg col-md-4 laptop1 packageButton' id='packageButton'><span id='typeHeader'>PLUS</span><br>Coverage: Php 50,001-Php 1000,00 Amount: Php 3,500</button>
                                    </td>
                                    <td id='rightMargin'>
                                        <label> </label> 
                                         <div class="break-one"></div>                                       
                                             <button  type="button" class='input-lg col-md-4 laptop2 packageButton' id='packageButton'><span id='typeHeader'>MAX</span> <br>Coverage: Php 100,001-Php 150,000 Amount: Php 5,250</button>
                                    </td>
                                  </tr>
                                  <tr>
                        </table>
                        
                        </div>
                         <div class="col-md-12">
                                <div class="break-one"></div>   </div>
                        <div style="color:#F44336;" id='selectTypeShow'>
                        <span id='selectTypePackage'></span> 
                        </div>                       
                            <div class="col-md-12">
                                <div class="break-one"></div>   
                                <div class="pull-left">                                    
                                    <input id="save" name="save" type="submit" class="btn btn-primary save" style='height: 50px;width: 100px;background-color:#e4509a;border-color: #e4509a;' value="GO">
                                </div>
                            </div>
                        </form>
        
                    </div>
                    
                </div>
            </div>
        </div>

</div>
  <div id="loader"></div>
                            

<div class="modal fade" id="emailSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p style="margin-left:20px;margin-bottom:35px;margin-top:10px;margin-right:35px;line-height: 20px;"><i class="fa-solid fa-envelope-circle-check"></i>Email Successfully Sent to client! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    

        <script type="text/javascript"> 
            $(document).ready(function(){



                $( ".desktop" ).click(function() {
                   jQuery('#typeselected').val('0');
               });
                $( ".laptop" ).click(function() {
                   jQuery('#typeselected').val('1');
               });
                $( ".laptop1" ).click(function() {
                   jQuery('#typeselected').val('2');
               });
                $( ".laptop2" ).click(function() {
                   jQuery('#typeselected').val('3');
               });
            
               
                $('.packageButton').click(function(e) {
                    $('.packageButton').not(this).removeClass('active');    
                    $(this).toggleClass('active');
                    e.preventDefault();
                });



         
        }); 
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
           jQuery('#emailSuccess').hide();
            var spinner = $('#loader');
              
              spinner.hide();
            jQuery('#emailSuccess').hide();



           jQuery('#submitForm').submit(function(e) {
               e.preventDefault();

               $(".email_personal_info").remove();
               $(".email_personal_info_check_error").remove(); 
               $(".email_personal_infocheck_success").remove();

               $(".selectTypePackage").remove();
               $(".selectTypePackage_error").remove(); 
               $(".selectTypePackage_success").remove();


               errornumber = 0; 

               if($('#email_personal_info').val() == ""){
                $('#email_personal_info').css('border-color', '#F44336');            
                $("#email_personal_info").after("<div class='email_personal_info' style='opacity:0.7;color:#F44336;'>Email Address is Empty</div>");    
                $('#email_personal_info').after('<i class="fa fa-times-circle email_personal_info_check_error fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #F44336;size:20px;"></i>');     
                errornumber = 1;           
              }else{                        
                $('#email_personal_info').after('<i class="fa fa-check-circle email_personal_infocheck_success fa-2x" aria-hidden="true" style=" float: right;top:-45px; position: relative;left:-10px !important;color: #4BB543;size:20px;"></i>');
                $('#email_personal_info').css('border-color', '#4BB543');                   
              } 


              if($('#typeselected').val() == ""){
               $("#selectTypePackage").text("Select type of Package");    
               errornumber = 1;           
             }else{
              $('#selectTypeShow').hide();
            }

            if(errornumber == 1){
              return false;
            }else{
                 $('#hidepage').hide();
              spinner.show();
            }

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
               let formData = new FormData(this);
               $.ajax({
                type:'POST',
                url: "{{ route('protechExpand.protechSendMail') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    // jQuery('#resend').val(response);
                   $('#hidepage').show();
                    jQuery('#email_personal_info').val('');
                    jQuery('#typeselected').val('');
                     jQuery('#emailSuccess').modal("show"); //checked
                       spinner.hide();
                       $('.email_personal_infocheck_success').removeClass('fa fa-check-circle'); 

                   },
                   error: function(response){
                    console.log(response);
                  }
                });
             });
          
        
      });
        </script>