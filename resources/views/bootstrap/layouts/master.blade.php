<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('page-title', 'YourAppName')</title>
        <meta name="viewport" content="width=device-width">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="/bootstrap/images/favicon/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" sizes="180x180" href="/bootstrap/images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/bootstrap/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/bootstrap/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/bootstrap/images/favicon/site.webmanifest">

        {!! HTML::style( mix("bootstrap/css/app.css") ) !!}

        @yield('style')

        @yield('header-scripts')
    </head>
    <body>
        <header>
            @include('bootstrap.layouts.menu-top')
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    &NonBreakingSpace;
                </div>
                <div class="col-md-9 col-sm-12 py-md-3 pl-md-5 bd-content">
                    <div class="row">
                        @include('bootstrap.layouts.messages')
                    </div>
                    <div class="row">
                        <h1 id="content-title">@yield('content-title')</h1>
                        <hr />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                    @include('bootstrap.layouts.menu-left')
                </div>
                <div class="col-md-9 col-sm-12">
                    <div id="content">
                        @yield('content')
                    </div>
                </div>
            </div>
            <footer>
                <div id="modals">
                    @yield('modals')
                </div>
                <div id="scripts">

                    {!! HTML::script( mix("bootstrap/js/app.js") ) !!}

                    @yield('scripts')
                </div>
            </footer>
        </div>
    </body>
</html>
