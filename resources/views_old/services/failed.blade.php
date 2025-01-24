@extends('layouts.layout1')

@section('content')
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
