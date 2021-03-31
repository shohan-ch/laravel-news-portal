<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Administration</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('extra-css')
  <style>
    /* Page loader */
    .loader {

      position: fixed;
      background-color: #ececec;
      width: 100%;
      height: 100%;
      z-index: 9999;
      padding-top: 20%;
      padding-left: 40%;
    }

    .loader img {
      width: 70px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('admin.partials.sidebar')
    @include('admin.partials.navbar')



    <div class="content-wrapper">
      <!---Page Loader-->
      <div class="loader">
        <img src="{{ asset('admin-assets/dist/img/loader/circles.svg') }}" alt="loader">
        <div></div>
      </div>

      @yield('content')


    </div>



    @include('admin.partials.footer')



  </div>

  <!-- jQuery -->
  <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin-assets/dist/js/adminlte.min.js') }}"></script>
  <script>
    $(function () {
            //Fade Out  Message
            $('#message').fadeOut(8000);
            
            //Page Loader
            setTimeout(() => {
                $('.loader').fadeOut(1000);
            }, 500);


        })


  </script>


  @yield('extra-js')


</body>
</html>