@extends('layouts.layout1')

@section('content')
<section class="banner banner-inquiry">
	<div class="container-fluid breadcrumb-container">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
			<ol class="breadcrumb rfs-1-5">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item" aria-current="page">Get a Quote</li>
					<li class="breadcrumb-item active" aria-current="page">Pro-Tech Computer Insurance Quote</li>
			</ol>
		</nav>
	</div>
	<div class="container">
		<div class="content">
			<h1 class="rfs-3-13 rfs-md-2-13 rfs-sm-1-10 ff-bold">Pro-Tech Computer Insurance Quote</h1>
		</div>
	</div>
</section>

<div class="main-content container">
	<div class="inner">
		<div class="row">
			<div class="col-md-12">
				<div class="top-container">
					{{ csrf_field() }}
					<div id="newapps" >@include('getaquote.protech.new')</div>
				</div>	           
			</div>           
		</div>
	</div>
</div>

<section class="divider">
	<img src="{{ asset('assets/img/wave-lines.svg') }}" alt="divider" />
</section>

<link rel="stylesheet" href="{{ asset('css/protect_new.css') }}">
<script src="{{ asset('js/protect_new.js') }}"></script>
<script src="{{ asset('js/masking.js') }}"></script>
<script src="{{ asset('js/address_protech.js') }}"></script>
@endsection
