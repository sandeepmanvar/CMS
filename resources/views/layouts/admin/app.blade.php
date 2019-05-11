<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }} - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/admin') }}/css/sb-admin-2.min.css" rel="stylesheet">

  @stack('css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @section('sidebar')
        @include('layouts.admin.sidebar')
    @show

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @include('layouts.admin.topbar')

        @section('content')
                
        @show
      </div>
      <!-- End of Main Content -->

      @include('layouts.admin.footer')
      
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  @include('layouts.admin.footer2')
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/admin') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('assets/admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/admin') }}/js/sb-admin-2.min.js"></script>

  <!-- Page Specific Scripts -->
  @stack('scripts-b')

</body>

</html>
