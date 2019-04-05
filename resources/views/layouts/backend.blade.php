<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex, nofollow, noarchive">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') @hasSection('page-subtitle') | @yield('page-subtitle') @endif</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ cdn_asset('/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ cdn_asset('/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->

        <!-- Plugins -->
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="{{ cdn_asset('/adminlte/plugins/iCheck/all.css') }}" rel="stylesheet" type="text/css">
        <!-- Select2 -->
        <link href="{{ cdn_asset('/adminlte/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
        
        <!-- EXTRAS -->
        @stack('head-scripts')

        <!-- END - Plugins -->

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ cdn_asset('/adminlte/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skin. -->
        <link rel="stylesheet" href="{{ cdn_asset('/adminlte/css/skins/' . config('adminlte.theme') . '.min.css') }}">

        <!-- Custom CSS -->
        <link href="{{ cdn_asset('/css/backend.css?version=' . config('adminlte.version')) }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="{{ cdn_asset('/css/googlefont.css') }}">

        <!-- jQuery 3 -->
        <script src="{{ cdn_asset('/adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- typeahead -->
        <script src="{{ cdn_asset('/adminlte/plugins/typeahead/bootstrap3-typeahead.min.js') }}"></script>
        
        <!-- datetimepicker -->
        {{-- <link href="{{ cdn_asset('/adminlte/plugins/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ cdn_asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
        {{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> --}}
        @yield('head-extras')
    </head>

    <body class="hold-transition {{ config('adminlte.theme') }} sidebar-mini">
        @auth
            <script type="text/javascript">
                /* Recover sidebar state */
                (function () {
                    if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
                        var body = document.getElementsByTagName('body')[0];
                        body.className = body.className + ' sidebar-collapse';
                    }
                })();
            </script>
        @endauth

        <!-- Site wrapper -->
        <div class="wrapper">

            @include('layouts.partials.backend.header')

            @include('layouts.partials.backend.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('page-title')
                        <small>@yield('page-subtitle')</small>
                    </h1>
                    @yield('breadcrumbs')
                </section>

                <!-- Main content -->
                <section class="content">

                    @include('flash::message')

                    @yield('content')

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> {{ config('adminlte.version') }}
                </div>
                <strong>Copyright &copy; {{ date('Y') }}. {!! config('adminlte.credits') !!}</strong>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- Bootstrap 3.3.7 -->
        <script src="{{ cdn_asset('/js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ cdn_asset('/adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ cdn_asset('/adminlte/plugins/fastclick/fastclick.js') }}"></script>

        <!-- Datepicker -->
        {{-- <script src="{{ cdn_asset('/adminlte/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
        <script src="{{ cdn_asset('/adminlte/plugins/moment/moment.js') }}"></script>
        <script src="{{ cdn_asset('/adminlte/plugins/moment/locale/id.js') }}"></script>
        <!-- DatetimePicker Js-->
        <script src="{{ cdn_asset('/js/bootstrap-datetimepicker.min.js') }}"></script>


        <!-- Plugins -->
        <!-- iCheck for checkboxes and radio inputs -->
        <script src="{{ cdn_asset('/adminlte/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
        <!-- Select2 -->
        <script src="{{ cdn_asset('/adminlte/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap notify-->
        <script src="{{ cdn_asset('/adminlte/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <!-- END - Plugins -->

        <!-- AdminLTE App -->
        <script src="{{ cdn_asset('/adminlte/js/adminlte.min.js') }}"></script>
        <!-- Custom Js -->
        <script src="{{ cdn_asset('/js/backend.js?version=' . config('adminlte.version')) }}"></script>
        <script src="{{ cdn_asset('/js/common.js') }}"></script>

        <script type="text/javascript">
            (function ($) {
                if (document.head.querySelector('meta[name="csrf-token"]')) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                } else {
                    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
                }
            })(jQuery);
        </script>
        <script type="text/javascript">
            (function ($) {
                /* Store sidebar state */
                $('.sidebar-toggle').click(function(event) {
                    event.preventDefault();
                    if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
                        localStorage.setItem('sidebar-toggle-collapsed', '');
                    } else {
                        localStorage.setItem('sidebar-toggle-collapsed', '1');
                    }
                });
            })(jQuery);
        </script>

        @yield('footer-extras')

        @stack('footer-scripts')
    </body>
</html>
