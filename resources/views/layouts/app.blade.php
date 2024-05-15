<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Công ty ABC</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css')}}" rel="stylesheet" type="text/css">
  <script src="{{ asset('https://use.fontawesome.com/releases/v6.3.0/js/all.js')}}" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
  @stack('styles')
  
  <!-- jquery -->
  <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- <script src="{{ asset('https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js') }}"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</head>
<body class="sb-nav-fixed">
    <!-- Top Navbar -->
    @include('layouts.navbar')
  
    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Main Content -->
        <div id="layoutSidenav_content">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mt-3 mx-3 text-gray-800 text-gray-800">@yield('title')</h1>
            </div>
            @yield('contents')
            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->
        </div>
    </div>

  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js') }}"></script>
  @stack('scripts')
</body>
</html>