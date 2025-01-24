@extends('layouts.app')

@section('content')

    <script>
      gtag('event', 'page_view', {
        'send_to': 'AW-936227039',
        'value': 'replace with value',
        'items': [{
          'id': '6488316053',
          'google_business_vertical': 'retail'
        }]
      });
    </script>
    "<!-- Event snippet for CVAP - Purchase conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-936227039/KlfZCIKUy-8BEN_htr4D',
      'value': 1.0,
      'currency': 'PHP',
      'transaction_id': ''
  });
</script>


      
    <div class="container" style="text-align: left;">
        <div class="row">
            <div class="col-md-12">
               <br>
                <div class="top-container">
                    <div class="category-name container">
                        <div class="row text-center">
                         <h1>
                              <h1 id="h111" name="h111" style="font-size: 35px !important;opacity: 0.8;font-weight: bold;">
                          <span style="color: #008080">Pro</span><span style="color: #008080">-tech Computer Insurance Quote  </span></h1>
                        </div>
                    </div>
                   <br>             
                   {{ csrf_field() }}  
                    <div class="progress"  class="col-md-12" >
                        <div class="progress-bar progress-bar-success" aria-valuenow="70"  aria-valuemin="0" aria-valuemax="100"  style="max-height: 4px !important;width:17%;background-color:red  !important;color:red !important;"></div>
                    </div>
                        <div class="col-md-12" id="homepagediv">
                           <h1 style="font-size: 40px !important;color: #000000;opacity: 0.7;">Congratulations!</h1>
                        </div>
                        
                        <div class="col-md-12" id="homepagediv" style="margin-bottom: 200px;">
                           <h1 style="font-size: 20px !important;color: #000000;opacity: 0.7;">Your computer is now covered by Cocogen Pro-Tech Computer Insurance. Please check your email for our confirmation message with details on how to access your ePolicy. </h1>
                        </div>
                       
                     </div>            
            </div>           
        </div>
    </div>

@endsection
