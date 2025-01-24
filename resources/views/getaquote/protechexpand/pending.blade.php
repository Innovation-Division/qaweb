@extends('layouts.app')

@section('content')

               
    <div class="container" style="text-align: left;">
        <div class="row">
            <div class="col-md-12">
               <br>
                <div class="top-container">
                    <div class="category-name container">
                        <div class="row text-center">
                         
                            <h1 id="h111" name="h111" style="font-size: 35px !important;opacity: 0.8;font-weight: bold;">
                          <span style="color: #e4509a">Pro</span><span style="color: #008080">-tech Computer Insurance Quote  </span></h1>
                        </div>
                    </div>
                   <br>             
                   {{ csrf_field() }}  
                    <div class="progress"  class="col-md-12" >
                        <div class="progress-bar progress-bar-success" aria-valuenow="70"  aria-valuemin="0" aria-valuemax="100"  style="max-height: 4px !important;width:17%;background-color:red  !important;color:red !important;"></div>
                    </div>
                        <div class="col-md-12" id="homepagediv">
                           <h1 style="font-size: 37px !important;color: #000000;opacity: 0.7;">Thank you for purchasing Pro-tech Computer Insurance</h1>
                        </div>
                         <div class="col-md-12" id="homepagediv">
                           <h1 style="font-size: 27px !important;color: #000000;opacity: 0.7;">Your payment is being processed. Please monitor your registered email  address for further update on your policy.</h1>
                        </div>
                        <div class="col-md-12" id="homepagediv" style="margin-bottom: 200px;">
                           <h1 style="font-size: 20px !important;color: #000000;opacity: 0.7;"></h1>
                        </div>
                       
                     </div>            
            </div>           
        </div>
    </div>

@endsection
