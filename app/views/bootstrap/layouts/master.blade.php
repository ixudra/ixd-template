<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('page-title')</title>
    <meta name="viewport" content="width=device-width">

    {{ HTML::style('vendor/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('vendor/datepicker/css/datepicker.css') }}
    {{ HTML::style('vendor/jquery-ui/css/jquery-ui-1.10.3.css') }}
    {{ HTML::style('/css/ixudra-bootstrap.css') }}

    @yield('style')

    @yield('header-scripts')
</head>
<body>
<div class="container">
    <header>
        @include('bootstrap.layouts.menu-top')
    </header>
    <div class="row">
        <div class="col-md-3">&NonBreakingSpace;</div>
        <div class="col-md-9">
            @include('bootstrap.layouts.messages')
            <div class="col-md-12">
                <h1 id="content-title">@yield('content-title')</h1>
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
            {{ HTML::script('vendor/jquery/js/jquery-2.0.2.js') }}
            {{ HTML::script('vendor/jquery-ui/js/jquery-ui-1.10.3.js') }}
            {{ HTML::script('vendor/bootstrap/js/bootstrap.js') }}
            {{ HTML::script('vendor/datepicker/js/bootstrap-datepicker.js') }}
            {{ HTML::script('vendor/timepicker/jquery.ui.timepicker.js') }}

            @yield('scripts')
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <ul class="nav navbar-nav nav-justified">
                <li><a href='#'>About</a></li>
                <li><a href='#'>Report a bug</a></li>
            </ul>
        </nav>
    </footer>
</div>
</body>
</html>