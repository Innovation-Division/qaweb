@extends('layouts.layout1')

@section('content')
<?php if(empty(session('authNo'))){
	$authNo = "";
} ?>
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
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-936227039/xJPrCMfI2u8BEN_htr4D',
      'value': 1.0,
      'currency': 'PHP',
      'transaction_id': '<?php echo session('con_no') ?>'
  });
</script>
<section class="banner banner-inquiry">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb rfs-1-5">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                <li class="breadcrumb-item active" aria-current="page">Auto Excel Plus Insurance Quote</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="content">
            <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Auto Excel Plus Insurance Quote</h1>
        </div>
    </div>
</section>

<div id="exTab3" class="main-content container quote-process1"> 
    <div class="inner">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <!-- <div><span class="fa fa-fw" title="Success"></span></div> -->
            <h2 class="mb-5">Transaction Succesful</h2>
            <p class="mb-5 rfs-1-10">Your payment has been accepted. You will receive an email with a link to view your Auto Excel Plus ePolicy within the next 3 working days</p>
            <button class="btn btn-secondary" onclick="window.location='{{ url('/') }}'" title="Continue Browsing" type="button">Continue Browsing</button>
        </div>
    </div>
</div>

<section class="divider">
  <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>


@endsection
