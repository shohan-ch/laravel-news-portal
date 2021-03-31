<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> @yield('title')</title>
    @yield('extra-css')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/assets/vendors/aos/dist/aos.css/aos.css" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="/assets/images/favicon.png" />

    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="main-panel">
            {{--  @include('website.layout.top-nav') --}}
            <x-top-nav />

            @if(request()->is('/'))
            <x-website.flash-news />
            @endif

            <div class="content-wrapper">
                <div class="container">
                    @yield('content')
                </div>
            </div>


            <x-footer />
            {{--  @include('website.layout.footer') --}}
        </div>
    </div>
    @yield('extra-js')
</body>
</html>