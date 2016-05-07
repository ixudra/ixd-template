<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title', 'YourAppName')</title>

        {{--{!! HTML::style( elixir("css/app.css") ) !!}--}}

        <!-- PACE-->
        <link rel="stylesheet" type="text/css" href="plugins/PACE/themes/blue/pace-theme-flash.css">
        <script type="text/javascript" src="plugins/PACE/pace.min.js"></script>
        <!-- Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap/dist/css/bootstrap.min.css">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="plugins/themify-icons/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">
        <!-- Malihu Scrollbar-->
        <link rel="stylesheet" type="text/css" href="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
        <!-- Animo.js-->
        <link rel="stylesheet" type="text/css" href="plugins/animo.js/animate-animo.min.css">
        <!-- Bootstrap Progressbar-->
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
        <!-- Summernote-->
        <link rel="stylesheet" type="text/css" href="plugins/summernote/dist/summernote.css">
        <!-- Toastr-->
        <link rel="stylesheet" type="text/css" href="plugins/toastr/toastr.min.css">
        <!-- SpinKit-->
        <link rel="stylesheet" type="text/css" href="plugins/SpinKit/css/spinners/7-three-bounce.css">
        <!-- Jvector Map-->
        <link rel="stylesheet" type="text/css" href="plugins/jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- Morris Chart-->
        <link rel="stylesheet" type="text/css" href="plugins/morris.js/morris.css">
        <!-- DataTables-->
        <link rel="stylesheet" type="text/css" href="plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/datatables.net-buttons-bs/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/datatables.net-colreorder-bs/css/colReorder.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css">
        <!-- Weather Icons-->
        <link rel="stylesheet" type="text/css" href="plugins/weather-icons/css/weather-icons-wind.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/weather-icons/css/weather-icons.min.css">
        <!-- FullCalendar-->
        <link rel="stylesheet" type="text/css" href="plugins/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" type="text/css" href="plugins/fullcalendar/dist/fullcalendar.print.css" media="print">
        <!-- jQuery MiniColors-->
        <link rel="stylesheet" type="text/css" href="plugins/jquery-minicolors/jquery.minicolors.css">
        <!-- Bootstrap Date Range Picker-->
        <link rel="stylesheet" type="text/css" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
        <!-- Primary Style-->
        <link rel="stylesheet" type="text/css" href="build/css/umega.css">
        <!-- Skins-->
        <link rel="stylesheet" type="text/css" href="build/css/skins.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
        <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('style')

        @yield('header-scripts')
    </head>
    <body>
        <!-- Main Sidebar start-->
        <aside class="main-sidebar pinned">
            @include('umega.layouts.menu-left')
        </aside>
        <!-- Main Sidebar end-->
        <!-- Header start-->
        <header>
            @include('umega.layouts.menu-top')
        </header>
        <!-- Header end-->
        <!-- Work Here start-->
        <section class="page-container">
            <div class="page-header clearfix">
                <div class="pull-left">
                    <h4 class="mt-0 mb-5">@yield('content-title')</h4>
                    @include('umega.layouts.breadcrumbs')
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-outline"><img src="build/images/flags/us.jpg" alt="" class="flag-icon">English</button>
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-outline dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul class="dropdown-menu dropdown-menu-right animated fadeInDown">
                            <li><a href="#"><img src="build/images/flags/de.jpg" class="flag-icon">German</a></li>
                            <li><a href="#"><img src="build/images/flags/fr.jpg" class="flag-icon">French</a></li>
                            <li><a href="#"><img src="build/images/flags/es.jpg" class="flag-icon">Spanish</a></li>
                            <li><a href="#"><img src="build/images/flags/it.jpg" class="flag-icon">Italian</a></li>
                            <li><a href="#"><img src="build/images/flags/jp.jpg" class="flag-icon">Japanese</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-content container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- Work Here end-->

        <!-- Right Sidebar start-->
        @include('umega.layouts.menu-right')
        <!-- Right Sidebar end-->

        <div id="modals">

            @yield('modals')

        </div>
        <div id="scripts">

            {{--{!! HTML::script( elixir("js/app.js") ) !!}--}}

            <!-- jQuery-->
            <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
            <!-- jQuery Cookie-->
            <script type="text/javascript" src="plugins/jquery.cookie/jquery.cookie.js"></script>
            <!-- Bootstrap JavaScript-->
            <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- jQuery Advanced News Ticker-->
            <script type="text/javascript" src="plugins/jquery-advanced-news-ticker/js/newsTicker.js"></script>
            <!-- Malihu Scrollbar-->
            <script type="text/javascript" src="plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
            <!-- Animo.js-->
            <script type="text/javascript" src="plugins/animo.js/animo.min.js"></script>
            <!-- Bootstrap Progressbar-->
            <script type="text/javascript" src="plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
            <!-- jQuery Easy Pie Chart-->
            <script type="text/javascript" src="plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
            <!-- Sparkline-->
            <script type="text/javascript" src="plugins/kapusta-jquery.sparkline/dist/jquery.sparkline.min.js"></script>
            <!-- Summernote-->
            <script type="text/javascript" src="plugins/summernote/dist/summernote.min.js"></script>
            <!-- Toastr-->
            <script type="text/javascript" src="plugins/toastr/toastr.min.js"></script>
            <!-- MomentJS-->
            <script type="text/javascript" src="plugins/moment/min/moment.min.js"></script>
            <!-- jQuery BlockUI-->
            <script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
            <!-- jQuery Counter Up-->
            <script type="text/javascript" src="plugins/jquery-waypoints/waypoints.min.js"></script>
            <script type="text/javascript" src="plugins/Counter-Up/jquery.counterup.min.js"></script>
            <!-- Jvector Map-->
            <script type="text/javascript" src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script type="text/javascript" src="plugins/jvectormap/maps/jquery-jvectormap-world-mill.js"></script>
            <!-- Flot Charts--><!--[if lte IE 8]>
            <script type="text/javascript" src="https://raw.githubusercontent.com/flot/flot/master/excanvas.min.js"></script>
            <![endif]-->
            <script type="text/javascript" src="plugins/flot/jquery.flot.js"></script>
            <script type="text/javascript" src="plugins/flot/jquery.flot.resize.js"></script>
            <script type="text/javascript" src="plugins/flot.curvedlines/curvedLines.js"></script>
            <script type="text/javascript" src="plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
            <!-- Morris Chart-->
            <script type="text/javascript" src="plugins/raphael/raphael-min.js"></script>
            <script type="text/javascript" src="plugins/morris.js/morris.min.js"></script>
            <!-- DataTables-->
            <script type="text/javascript" src="plugins/datatables.net/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script type="text/javascript" src="plugins/jszip/dist/jszip.min.js"></script>
            <script type="text/javascript" src="plugins/pdfmake/build/pdfmake.min.js"></script>
            <script type="text/javascript" src="plugins/pdfmake/build/vfs_fonts.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script type="text/javascript" src="plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
            <!-- jQuery UI-->
            <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- FullCalendar-->
            <script type="text/javascript" src="plugins/fullcalendar/dist/fullcalendar.min.js"></script>
            <!-- jQuery MiniColors-->
            <script type="text/javascript" src="plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
            <!-- Bootstrap Date Range Picker-->
            <script type="text/javascript" src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
            <!-- Custom JS-->
            <script type="text/javascript" src="build/js/app.js"></script>
            <script type="text/javascript" src="build/js/demo.js"></script>
            <script type="text/javascript" src="build/js/pages/index.js"></script>

            @yield('scripts')
        </div>

    </body>
</html>