@extends('layouts.layout1')

@section('content')
<?php if(empty($authNo)){
	$authNo = "";
} ?>
<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-936227039',
    'value': 'replace with value',
    'items': [{
      'id': '6488316047',
      'google_business_vertical': 'retail'
    }]
  });
</script>

<section class="banner banner-inquiry">
	<div class="container-fluid breadcrumb-container">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb rfs-1-5">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item" aria-current="page">Get a Quote</li>
					<li class="breadcrumb-item active" aria-current="page">Covid-19 Assist+ Insurance Quote</li>
			</ol>
		</nav>
	</div>
	<div class="container">
		<div class="content">
			<h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Covid-19 Assist+ Insurance Quote</h1>
		</div>
	</div>
</section>
  
<div class="main-content container">
    <div class="inner">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <h2 class="mb-5">Transaction Failed.</h2>
            <div class="text-center">
                <button class="btn btn-secondary" onclick="window.location='{{ url('/') }}'" type="button">Continue Browsing</button>
            </div>
        </div>
    </div>
</div>

<section class="divider">
    <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>
@endsection
