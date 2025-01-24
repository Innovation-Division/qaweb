<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="google-site-verification" content="Lf6f3Aidj7cjZWhrUIlioufaj1GBdGUM4wJXekxmVUQ" />
        <title>@yield('title')</title>

        <link rel="icon" href="assets/img/favicon.ico" type="image/x-ico" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet/less" type="text/css" href="{{ asset('/assets/css/global.less') }}" />

        <!-- DEV MODE -->
        <script src="https://cdn.jsdelivr.net/npm/less@4.1.1" data-env="development"></script>
        <script>
            less.watch();
        </script>
        <!-- -->
    </head>

    <body>
        <div class="bg-layout5 page-fh">
            <div class="main-content">
                <div class="inner">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 mb-4 mb-md-0">
                                        <div class="position-relative h-100">
                                            <h1 class="text-color-primary text-center lh-1 ff-montserrat-medium error-code-text">@yield('code')</h1>
                                            <div class="img-fluid position-absolute bottom-0 start-0 end-0 text-center">
                                                <img src="{{ asset('/assets/img/crack.svg') }}" class="img-fluid w-75" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 text-center text-md-start">
                                        <h3 class="mrfs-1-13 mrfs-lg-2-5 mb-3">@yield('message')</h3>
                                        <p class="text-color-verydarkgray">The page you are looking for might have been removed, had its name changed, or temporarily not available.</p>
                                        <div class="text-center text-md-start">
                                            <a href="{{ app('router')->has('home') ? route('home') : url('/') }}" class="btn btn-secondary mrfs-1 mrfs-lg-1-5 me-3">Go Home</a>
                                            <a href="{{ url()->previous() }}" class="btn btn-secondary-light mrfs-1 mrfs-lg-1-5">Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
