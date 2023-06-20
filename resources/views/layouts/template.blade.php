<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rawat Jalan">
    <meta name="Fajar Setiawan" content="Rawat Jalan">

    <title>Rawat Jalan SPH</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('resources/sources/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('resources/sources/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('resources/sources/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    @section('css')
    @show

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- POTONG SIDEBAR AWAL -->

            @include('layouts.menu')

            <!-- POTONG SIDEBAR AKHIR -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- TOPBAR -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- POTONG TOPBAR AKHIR -->
                    
                    @include('layouts.topbar')

                    <!-- POTONG TOPBAR AKHIR -->

                </nav>

                <!-- End of TOPBAR -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- POTONG CONTENT AWAL -->

                    @yield('content')

                    <!-- POTONG CONTENT AKHIR -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                
                <!-- POTONG FOOTER AKHIR -->

                @include('layouts.footer')

                <!-- POTONG FOOTER AKHIR -->
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('resources/sources/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/sources/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('resources/sources/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('resources/sources/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('resources/sources/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('resources/sources/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('resources/sources/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('resources/sources/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('resources/sources/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('resources/sources/js/demo/datatables-demo.js') }}"></script>

    @section('js')
    @show

</body>

</html>