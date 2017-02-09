<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('page-title', 'YourAppName')</title>
        <meta name="viewport" content="width=device-width">

        {!! HTML::style( elixir("bootstrap/css/app.css") ) !!}

        @yield('style')

        @yield('header-scripts')
    </head>
    <body>
        <div class="container">
            <header>
                @include('bootstrap.layouts.menu-top')
            </header>
            <div class="row">
                <div class="col-md-3">
                    &NonBreakingSpace;
                </div>
                <div class="col-md-9">
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
                <div class="col-md-3">
                    @include('bootstrap.layouts.menu-left')
                </div>
                <div class="col-md-9">
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

                    {!! HTML::script( elixir("bootstrap/js/app.js") ) !!}

                    @yield('scripts')
                </div>
            </footer>
        </div>
    </body>
</html>