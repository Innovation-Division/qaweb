
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" type="text/css" href="https://www.cocogen.com/asset/webjscss/bootstrap.css">

    <style type="text/css">


<style>
      #watermark { position: fixed; bottom: 0px; right: 0px; width: 200px; height: 200px; opacity: .1;margin-bottom: -100px;margin-top: 10px !important; }
    </style>
</style>
  </head>
  <body style="font-family: Helvetica"  >
 <div id="watermark">
  <label></label>
  <span id="cocno" style="float: center;z-index: 2;margin-top: 23px; margin-left: 96px;font-size: 11px !important;">{{$cocno}}</span>
  <label id="name" style="float: center;z-index: 2;margin-top: 92px; margin-left: 140px;">{{$name}}</label>
  <label id="datebirth" style="float: center;z-index: 2;margin-top: 92px; margin-left: 500px;">{{$birthdate}}</label>
  <label id="address" style="float: center;z-index: 2;margin-top: 113px; margin-left: 140px;">{{$address}}</label>
    <label id="beneficiary" style="float: center;z-index: 2;margin-top: 132px; margin-left: 140px;">{{$beneficiary}}</label>
  <label id="relationship" style="float: center;z-index: 2;margin-top: 132px; margin-left: 500px;">{{$relationship}}</label>
  <span id="from" style="float: center;z-index: 2;margin-top: 180px; margin-left: 220px;font-size: 14px !important;">{{$from}}</span>
  <span id="to" style="float: center;z-index: 2;margin-top: 180px; margin-left: 340px;font-size: 14px !important;">{{$to}}</span>
<?php $image_path = '/images/backCovidPrime.jpg'; ?>
  <img src="{{ public_path() . $image_path }}"  height="100%" width="100%" style="margin-top: -55px;margin-bottom: -100px;"></div>
    
    
    

 

  </body>
</html>
