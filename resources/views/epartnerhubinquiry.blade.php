
  <div class="category-name container" style="text-align: left;">
                <div class="col-md-4 ">
                    <h1>
                        Send an Inquiry
                    </h1>
                </div>
                
            </div>
            
        
        <div class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="page-title category-title">
                        <h1>
                            Send an Inquiry</h1>
                    </div>
                   
                    <div class="product-inquiry-form mega-form-builds" style="font-family: muli;line-height: ">
                        <form  class="form-horizontal" id="product-inquiry-form" method="post" action="{{route('epartnerhubsaveinquiry')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="col-md-4 {{ $errors->has('topic') ? ' has-error' : '' }}">
                                <label for="topic">Topic</label> 
                                <select  id="topic" name="topic"  class="form-control selectpicker input-lg" data-style="input-lg btn-topic" data-size="10" data-live-search="true" >                                        
                                            <option value="" style="display:none">Topic *</option>
                                            <option value="Product Inquiry"  <?php if(old('topic') === "Product Inquiry"){ ?> selected="selected"<?php }?> >Product Inquiry</option>
                                            <option value="Claims"  <?php if(old('topic') === "Claims"){ ?> selected="selected"<?php }?> >Claims</option>
                                            <option value="Payments"  <?php if(old('topic') === "Payments"){ ?> selected="selected"<?php }?> >Payments</option>
                                            <option value="Feedback"  <?php if(old('topic') === "Feedback"){ ?> selected="selected"<?php }?> >Feedback</option>
                                            <option value="Others"  <?php if(old('topic') === "Others"){  ?> selected="selected"<?php }?> >Others</option>                                               
                                </select>
                                @if ($errors->has('topic'))
                                    <span class="help-block" style="margin-top: -12px;">
                                        <strong>{{ $errors->first('topic') }}</strong>
                                    </span>
                                @endif
                            </div>      

                            <div id="product_div" class="col-md-4 {{ $errors->has('product') ? ' has-error' : '' }}">
                                <label for="product">Product</label> 
                                <select  id="product" name="product"  class="form-control selectpicker input-lg" data-style="input-lg btn-product" data-size="10" data-live-search="true" >
                                        <option value="" style="display:none">Product *</option>                                        
                                        @foreach($cocogen_product_lines as $cocogen_product_line)
                                            <option value="{{$cocogen_product_line->line}}" data-id="{{$cocogen_product_line->line_cd}}"  data-value="{{$cocogen_product_line->line}}" <?php if(old('product') === $cocogen_product_line->line){  ?> selected="selected"<?php }?> >{{$cocogen_product_line->line}}</option>
                                        @endforeach        
                                </select>
                                 @if ($errors->has('product'))
                                    <span class="help-block" style="margin-top: -12px;">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="branch_div" class="col-md-4 {{ $errors->has('branch') ? ' has-error' : '' }}">
                                <label for="branch">Assigend Branch/Unit</label> 
                                <select  id="branch" name="branch"  class="form-control selectpicker input-lg" data-style="input-lg btn-branch" data-size="10" data-live-search="true" >
                                        <option value="" style="display:none">Branch/Unit *</option>                                        
                                           
                                </select>
                                 @if ($errors->has('branch'))
                                    <span class="help-block" style="margin-top: -12px;">
                                        <strong>{{ $errors->first('branch') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="clearfix">   </div>
                            <div class="break-one"></div>   
                            <div class="clearfix"> </div>
                            
                            <div class="col-md-12 {{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message">Message</label>
                                <textarea rows="5" name="message" id="message" class="form-control btn-white" placeholder="Inquiry *">{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block" style="margin-top: -12px;">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                          
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-sitekey="6Lfl1cMUAAAAANJEoCM5_TMjiuVVcyDkw279Kb_z">
                                </div>
                            </div>                        
                           
                            <div class="clearfix">
                            </div>
                            <div class="col-md-12">
                                <div class="break-one"></div>   
                                <div class="pull-left">                                    
                                    <input id="save" name="save" type="submit" class="btn btn-primary" value="SUBMIT">
                                </div>
                            </div>
                        </form>
        
                    </div>
                    
                </div>
            </div>
        </div>
        <style type="text/css">
            .btn-topic,
            .btn-product,
            .btn-branch,
            .btn-white{          
                background-color: #ffffff;
                border-color: #808080;
                margin-bottom: 15px !important;
            }
        </style>
        <script type="text/javascript"> 
            $(document).ready(function(){
                jQuery('#topic').val("");
                jQuery('#product_div').hide();
                jQuery('#branch_div').hide();
                if(jQuery('#topic').val() == "Product Inquiry"){
                    jQuery('#product_div').show();
                    jQuery('#branch_div').show();

                }else{ 
                    jQuery('#product_div').hide();
                    jQuery('#branch_div').hide();
                }                    
            });
            
            jQuery('#topic').on('change', function() {
                if(this.value == "Product Inquiry"){
                    jQuery('#product_div').show();
                    jQuery('#branch_div').show();

                }else{ 
                    jQuery('#branch_div').hide();
                    jQuery('#product_div').hide();
                }    
            }); 

            jQuery('#product').on('change', function() {
                if(this.value == ""){
                    jQuery('#branch_div').hide();
                }else{ 
                    var line = $(this).find(':selected').attr('data-id')
                    
                    if(line == ""){
                        jQuery('#branch').empty();                        
                        $('#branch').append($('<option>', { 
                        value: "HO",
                        text : "Head Office" 
                        }));    
                        jQuery('#branch').selectpicker("refresh"); 
                    }else{
                        jQuery('#branch').empty();     
                        var _token = jQuery('input[name="_token"]').val();
                        var typeid = "{{\Auth::user()->type}}";
                        var email = "{{\Auth::user()->email}}";
                        jQuery.ajax({
                        url:'{{url('/')}}' + '/api/epolicy/get/branch',
                        method:"GET",
                        data:{ _token:_token,line:line,typeid:typeid,email:email},
                        success:function(result)
                        {        
                            var countchar = result.length;
                            if(countchar == 0){
                                jQuery('#branch').empty();                        
                                $('#branch').append($('<option>', { 
                                value: "HO",
                                text : "Head Office" 
                                }));    
                                jQuery('#branch').selectpicker("refresh"); 
                            }else{
                                jQuery('#branch').empty();
                                jQuery.each(result, function(key, value){
                                $('#branch').append($('<option>', { 
                                    value: value.branch_cd,
                                    text : value.name 
                                }));    
                                jQuery('#branch').selectpicker("refresh"); 
                            })   
                            }
                                
                          }
                        })
                    }                    
                    jQuery('#branch_div').show();
                }    
            }); //nav-tabs
            jQuery('.nav-tabs').click(function(){
                jQuery('#topic').val("");
                jQuery('#branch').val("");
                jQuery('#product').val("");
                jQuery('#product_div').hide();
                jQuery('#branch_div').hide();
                jQuery('#branch').selectpicker("refresh"); 
                jQuery('#product').selectpicker("refresh"); 
                jQuery('#topic').selectpicker("refresh"); 
            });
             jQuery('#save').click(function(){
                errornumber = 0;
                $(".validation_topic").remove();
                $(".validation_topic_check_error").remove(); 
                $(".validation_topic_check_success").remove();  
                $(".validation_message").remove();
                $(".validation_message_check_error").remove(); 
                $(".validation_message_check_success").remove(); 
                if($('#topic').val() == ""){
                    $('.btn-topic').css('border-color', '#F44336');                    
                    $('.btn-topic').after('<i class="fa fa-times-circle validation_topic_check_error fa-lg" aria-hidden="true" style=" float: right;top:-45px !important; position: relative;left:-25px !important;color: #F44336;size:10px;z-index: 2 !important;"></i>');   
                    $("#topic").after("<div class='validation_topic' style='opacity:0.7;color:#F44336;margin-top: -14px;font-size:13px;margin-bottom:40px !important;float: left;'>Topic is required!</div>");
                    errornumber = 1;           
                }else{                                      
                    $('.btn-topic').after('<i class="fa fa-check-circle validation_topic_check_success fa-lg" aria-hidden="true" style=" float: right;top:-45px !important; position: relative;left:-25px !important;color: #4BB543;size:10px;z-index: 2 !important;"></i>');
                    $('.btn-topic').css('border-color', '#4BB543');                   
                }

                if($('#message').val() == ""){
                    $('#message').css('border-color', '#F44336');
                    $("#message").after("<div class='validation_topic' style='opacity:0.7;color:#F44336;margin-top: -14px;font-size:13px;margin-bottom:40px !important;float: left;'>Message is required!</div>");   
                    errornumber = 1;           
                }else{                                      
                    $('#message').css('border-color', '#4BB543');                   
                }

                if($('#topic').val() == "Product Inquiry"){
                    $(".validation_product").remove();
                    $(".validation_product_check_error").remove(); 
                    $(".validation_product_check_success").remove();  
                    if($('#product').val() == ""){
                        $('.btn-product').css('border-color', '#F44336');                    
                        $('.btn-product').after('<i class="fa fa-times-circle validation_product_check_error fa-lg" aria-hidden="true" style=" float: right;top:-45px !important; position: relative;left:-25px !important;color: #F44336;size:10px;z-index: 2 !important;"></i>');   
                        $("#product").after("<div class='validation_product' style='opacity:0.7;color:#F44336;margin-top: -14px;font-size:13px;margin-bottom:40px !important;float: left;'>Product is required!</div>");   
                        errornumber = 1;           
                    }else{                                      
                        $('.btn-product').after('<i class="fa fa-check-circle validation_product_check_success fa-lg" aria-hidden="true" style=" float: right;top:-45px !important; position: relative;left:-25px !important;color: #4BB543;size:10px;z-index: 2 !important;"></i>');
                        $('.btn-product').css('border-color', '#4BB543');                   
                    }
                }
                if($('#topic').val() == "Product Inquiry"){
                    $(".validation_branch").remove();
                    $(".validation_branch_check_error").remove(); 
                    $(".validation_branch_check_success").remove(); 
                    if($('#branch').val() == ""){
                        $('.btn-branch').css('border-color', '#F44336');                    
                        $('.btn-branch').after('<i class="fa fa-times-circle validation_branch_check_error fa-lg" aria-hidden="true" style=" float: right;top:-45px !important; position: relative;left:-25px !important;color: #F44336;size:10px;z-index: 2 !important;"></i>');   
                        $("#branch").after("<div class='validation_branch' style='opacity:0.7;color:#F44336;margin-top: -14px;font-size:13px;margin-bottom:40px !important;float: left;'>Assigned branch/unit is required!</div>"); 
                        errornumber = 1;           
                    }else{                                      
                        $('.btn-branch').after('<i class="fa fa-check-circle validation_branch_check_success fa-lg" aria-hidden="true" style=" float: right;top:-55px !important; position: relative;left:-25px !important;color: #4BB543;size:10px;z-index: 2 !important;"></i>');
                        $('.btn-branch').css('border-color', '#4BB543');                   
                    }
                }         
                if(errornumber !== 0){
                    return false;
                } 
                }); 
        </script>