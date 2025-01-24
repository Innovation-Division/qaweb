@extends('layouts.app')

@section('content')
    <style type="text/css">
           

      #BlockUIConfirm {
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);

      }
 
 
  #summaryfinalpage th{
      border-left: 0px;
      padding: 20px 30px;
      background-color: #008080;
      color: #FFF; 
      border-radius: 0px;
      height: 65px;
      border-bottom: 3px solid #ffffff;
      font-family: muli !important;
    text-align: center;

  }


  #labelColor{
    color: #188c8c;
    font-weight: normal;
  }
  .valueDisplay{
    font-weight: bold;
    font-size:20px !important;
    font-family: muli !important;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
  }
 
</style>
 
@if($typeOfDevice == 'DESKTOP')
<div class="container">
  <label id='labelColor' style="font-size: 30px;font-weight: bold;padding-top:50px"> Pro-Tech Expand </label>
  <div class="row">
  
    <div class="col-md-12">
     
      <table class="">
        <thead>
        </thead>
        <tbody>
          <tr>
     
            <td style="font-size: 20px;" colspan="2">Personal Data</td>
          </tr>
          <tr>
          <tr>
      
            <td colspan="2"><label id='labelColor'>Name</label><br>
              <label class='valueDisplay'>{{ $fullName }}</label>
            </td>
          </tr>
          <tr >
  
             <td style="width: 300px"><label id='labelColor'>Mobile No</label>.<br>
               <label class='valueDisplay'>{{ $mobileNo}}</label>
             </td>
            <td>
              <label id='labelColor'>Email Address</label><br>
              <label class='valueDisplay'>{{ $emailAddress}}</label></td>
          </tr>
            <tr>
        
            <td colspan="2">
              <label id='labelColor'>Present Address</label><br>
              <label class='valueDisplay'>{{ $presentAddress }}</label></td>
          </tr>
         <tr>
 
         <td style="font-size: 20px;"  colspan="2">Device Information</td>
      
          </tr>
          <tr>
            <td><label id='labelColor'>Type of Device</label><br>  <label class='valueDisplay'>{{$typeOfDevice}}</label></td>
          </tr>
          <tr>
     
            <td colspan="2"><label id='labelColor'>Location of Device</label><br>  <label class='valueDisplay'>{{ $locationAddress }}</label></td>
           
          </tr>
            <tr>
     
            <td  colspan="2"><label id='labelColor'>Device Specification</label></td>
          </tr>

        </tbody>
      </table>
    
        <table id="summaryfinalpage" class="table-striped col-md-12" style="border-bottom: 1px solid #008080;">
        <thead>
          <tr>
            <th scope="col">Hardware</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">SerialNo</th>
            <th scope="col">Year Purchased</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($parts_hardware as $parts_hardware)
          <tr>
            <td scope="row" class='valueDisplay'>{{ $parts_hardware['protech_device_part']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protect_make']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protect_model']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protech_serial_no']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protech_year_purchased']}}</td>
             <td class='valueDisplay'>{{ $parts_hardware['protech_value']}}</td>
          </tr>
            @endforeach
            @if($protech_device_type == 'Yes')
            @foreach ($device_hardware as $device_hardware)
           <tr>
            <td scope="row" class='valueDisplay'>{{ $device_hardware['protech_device_part']}}</td>
            <td class='valueDisplay'>{{ $device_hardware['protect_make']}}</td>
            <td class='valueDisplay'>{{ $device_hardware['protect_model']}}</td>
            <td class='valueDisplay'>{{ $device_hardware['protech_serial_no']}}</td>
            <td class='valueDisplay'>{{ $device_hardware['protech_year_purchased']}}</td>
             <td class='valueDisplay'>{{ $device_hardware['protech_value']}}</td>
          
            @endforeach
               @endif
            </tr>
        </tbody>
      </table>
    <hr>
    <hr>
      <div class="col-md-12 break-two"><br></div>
      <div class="col-md-12 break-two"><br></div>
      <div class="col-md-12 break-two"><br></div>
      <div class="col-md-12 break-two"><br></div>

      </div>
    </div>
  </div>
@else
<div class="container">
  <label id='labelColor' style="font-size: 30px;font-weight: bold;padding-top:50px"> Pro-Tech Expand </label>
  <div class="row">
  
    <div class="col-md-12">
     
      <table class="table">
        <thead>
        </thead>
        <tbody>
          <tr>
     
            <td style="font-size: 20px;font-family: muli !important;" colspan="2">Personal Data</td>
          </tr>
          <tr>
          <tr>
      
            <td colspan="2"><label id='labelColor'>Name</label><br>
              <label class='valueDisplay'>{{ $fullName }}</label></td>
          </tr>
          <tr >
  
             <td style="width: 300px"><label id='labelColor'>Mobile No</label>.<br>
               <label class='valueDisplay'>{{ $mobileNo}}</label>
             </td>
            <td>
              <label id='labelColor'>Email Address</label><br>
              <label class='valueDisplay'>{{ $emailAddress}}</label></td>
          </tr>
            <tr>
        
            <td colspan="2">
              <label id='labelColor'>Present Address</label><br>
              <label class='valueDisplay'>{{ $presentAddress }}</label></td>
          </tr>
         <tr>
 
 
             <td style="font-size: 20px;font-family: muli !important;"  colspan="2">Device Information</td>
           </div>
          </tr>
          <tr>
              <td colspan="3"><label id='labelColor'>Type of Device</label><br>
               <label class='valueDisplay'>{{ $typeOfDevice }}</label></td>
          </tr>
              <tr>
               <td><label id='labelColor'>Make</label>.<br>
                  <label class='valueDisplay'>{{ $protect_make }}</label></td>

                <td style="width: 10px">
                  <label id='labelColor'>Model</label><br>
                   <label class='valueDisplay'>{{ $protect_model }}</label></td>
                </td>

                  <td><label id='labelColor'>Serial No.</label><br>
                     <label class='valueDisplay'>{{ $protech_serial }}</label></td>
             </tr>
             <tr>

              <td><label id='labelColor'>Year Purchased</label><br>
                 <label class='valueDisplay'>{{ $protech_year }}</label></td>
              <td><label id='labelColor'>Value</label><br>
                <label class='valueDisplay'>{{ $protech_value }}</label></td>  
            </tr>
            <tr>
        </tbody>
      </table>
        <!-- <table id="summaryfinalpage" class="table-striped col-md-12" style="border-bottom: 1px solid #008080;">
        <thead>
          <tr>
            <th scope="col">Hardware</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">SerialNo</th>
            <th scope="col">Year Purchased</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($parts_hardware as $parts_hardware)
          <tr>
            <td scope="row" class='valueDisplay'>{{ $parts_hardware['protech_device_part']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protect_make']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protect_model']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protech_serial_no']}}</td>
            <td class='valueDisplay'>{{ $parts_hardware['protech_year_purchased']}}</td>
             <td class='valueDisplay'>{{ $parts_hardware['protech_value']}}</td>
          </tr>
            @endforeach
        </tbody>
        
      </table> -->
      <div class="col-md-12 break-two"><br></div>
  <div class="col-md-12 break-two"><br></div>
      </div>
    </div>
  </div>
  @endif
@endsection