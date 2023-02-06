<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
        rel="shortcut icon"
        href="{{url('frontend/assets/images/favicon.svg')}}"
        type="image/x-icon"
        />
        <title>Mot Buoc Admin</title>

        <!-- ========== All CSS files linkup ========= -->
        <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{url('frontend/assets/css/lineicons.css')}}" />
        <link rel="stylesheet" href="{{url('frontend/assets/css/materialdesignicons.min.css')}}" />
        <link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.css')}}" />
        <link rel="stylesheet" href="{{url('frontend/assets/css/fullcalendar.css')}}" />
        <link rel="stylesheet" href="{{url('frontend/assets/css/main.css')}}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    </head>
    <body>
        <!--Sidebar nav --->
        @include('adminfrontend.sidebar_nav')
        <div class="overlay"></div>
        <!-- ======== sidebar-nav end =========== -->

        <!-- ======== main-wrapper start =========== -->
        <main class="main-wrapper">
            <!-- ========== header start ========== -->
            @include('adminfrontend.mainheader')
            <!-- ========== header end ========== -->

            <!-- ========== section start ========== -->
            <section class="section">
                @yield('admincontent')
            </section>
            <!-- ========== section end ========== -->


            <!-- ========== footer start =========== -->
            <footer class="footer">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-center text-md-start">
                        <p class="text-sm">
                        Designed and Developed by
                        <a
                            href="https://plainadmin.com"
                            rel="nofollow"
                            target="_blank"
                        >
                            PlainAdmin
                        </a>
                        </p>
                    </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                    <div
                        class="
                        terms
                        d-flex
                        justify-content-center justify-content-md-end
                        "
                    >
                        <a href="#0" class="text-sm">Term & Conditions</a>
                        <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                    </div>
                    </div>
                </div>
                <!-- end row -->
                </div>
                <!-- end container -->
            </footer>
            <!-- ========== footer end =========== -->
        </main>
        <!-- ======== main-wrapper end =========== -->

        <!-- ========= All Javascript files linkup ======== -->
        <script src="{{url('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/Chart.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/dynamic-pie-chart.js')}}"></script>
        <script src="{{url('frontend/assets/js/moment.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/fullcalendar.js')}}"></script>
        <script src="{{url('frontend/assets/js/jvectormap.min.js')}}"></script>
        <script src="{{url('frontend/assets/js/world-merc.js')}}"></script>
        <script src="{{url('frontend/assets/js/polyfill.js')}}"></script>
        <script src="{{url('frontend/assets/js/main.js')}}"></script>
    </body>
</html>
