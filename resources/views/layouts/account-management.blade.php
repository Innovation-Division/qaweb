<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $title }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}" crossorigin="use-credentials">
    <link rel="mask-icon" href="{{ asset('assets/favicon/safari-pinned-tab.svg') }}" color="#008080">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="robots" content="NOINDEX,NOFOLLOW">
    <meta name="description" content="{!! $metadescription !!}">
    <meta name="keywords" content="{!! $keyword !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('/') }}">
    <!-- Fonts -->
    <link href="{{ asset('assets/css/Inter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/Inter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/stepper.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/account-as.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/as-partner.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/form-1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-2-1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-3.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-4.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/form-6.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/validation.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" /> --}}
@vite(['resources/css/app.css', 'resources/js/main.jsx'])

</head>

<body>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-1.js') }}"></script>
    <script src="{{ asset('assets/js/form-2.js') }}"></script>
    <script src="{{ asset('assets/js/form-2-1.js') }}"></script>
    <script src="{{ asset('assets/js/form-3.js') }}"></script>
    <script src="{{ asset('assets/js/form-4.js') }}"></script>
    <script src="{{ asset('assets/js/form-5.js') }}"></script>
    <script src="{{ asset('assets/js/form-6.js') }}"></script>
    <script src="{{ asset('assets/js/account-as.js') }}"></script>
    <script src="{{ asset('assets/js/account-as-partner.js') }}"></script>
    <script src="{{ asset('assets/js/form-modal.js') }}"></script>

    @if (!empty($ids))
        <script>
            $(document).ready(function() {
                let userId = "{{ $ids }}"; 
                let region = "{{ $region }}"; 
                let province = "{{ $province }}"; 
                let city = "{{ $city }}"; 
                let barangay = "{{ $barangay }}"; 
                let unitno = "{{ $unitno }}"; 
                let street = "{{ $street }}"; 
                let zip = "{{ $zip }}"; 
                sessionStorage.setItem("submittedID", userId);
                sessionStorage.setItem("policyholder_id", userId);
                $('#policyholder_id').val(userId);
                const policyholderId = sessionStorage.getItem("policyholder_id");
                $("input[name='hdn_id']").val(userId);
                $('#form3').show();
                $('#accountAs').hide();
                $('#form1').hide();
                $('#form2').hide();
                $('#form2-1').hide();

                // let region = "{{ $region }}"; 
                // let province = "{{ $province }}"; 
                // let city = "{{ $city }}"; 
                // let barangay = "{{ $barangay }}"; 
                // let unitno = "{{ $unitno }}"; 
                // let street = "{{ $street }}"; 
                // let zip = "{{ $zip }}";

                // Check if region is not null and not an empty string
                if(region !== null && region !== "") {
                    $("#region").val(region);
                }

                if(province !== null && province !== "") {
                    $("#province").val(province);
                }

                if(city !== null && city !== "") {
                    $("#city").val(city);
                }

                if(barangay !== null && barangay !== "") {
                    $("#barangay").val(barangay);
                }

                if(unitno !== null && unitno !== "") {
                    $("#unitNo").val(unitno);
                }

                if(street !== null && street !== "") {
                    $("#street").val(street);
                }

                if(zip !== null && zip !== "") {
                    $("#zip").val(zip);
                }

              
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#accountAs').show();
            });
        </script>
    @endif

</body>

</html>
