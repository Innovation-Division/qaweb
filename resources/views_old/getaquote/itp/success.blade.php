@extends('layouts.layout1')

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


<!-- Event snippet for CVAP - Purchase conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-936227039/w3V-CMb40OADEN_htr4D',
      'value': 1.0,
      'currency': 'PHP',
      'transaction_id': ''
  });
</script>

<section class="banner banner-inquiry">
    <div class="container-fluid breadcrumb-container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb rfs-1-5">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Get a Quote</li>
                <li class="breadcrumb-item active" aria-current="page">International Travel Plus Quote</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="content">
          <h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">International Travel Plus Quote</h1>
        </div>
    </div>
</section>

<div class="main-content container">
    <div class="inner">
        <div class="text-center mx-auto" style="max-width: 700px;">
            <!-- <div><span class="fa fa-fw" title="Success"></span></div> -->
            {{ csrf_field() }}
            <h2 class="mb-5">Congratulations!</h2>
            <p class="mb-5 rfs-1-10">You are now insured with International Travel Excel Plus Insurance. Please check your email for our confirmation message with details on how to access your ePolicy.</p>
        </div>
    </div>
</div>

<section class="divider">
  <img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>

@endsection
