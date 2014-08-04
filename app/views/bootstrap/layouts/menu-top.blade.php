<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        {{ HTML::linkRoute('index', 'YourAppName', array(), array('class' => 'navbar-brand')) }}
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            @if( Auth::check() )
            {{--
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{ Auth::user()->name }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::linkRoute('users.show', 'Profile', array(Auth::user()->id)) }}</li>
                        <li class="divider"></li>
                        <li>{{ HTML::linkRoute('changeEmail', 'Change E-Mail Address', array('id' => Auth::user()->id)) }}</li>
                        <li>{{ HTML::linkRoute('changePassword', 'Change Password', array('id' => Auth::user()->id)) }}</li>
                        <li class="divider"></li>
                        <li>{{ HTML::linkRoute('logout', 'Log Out') }}</li>
                    </ul>
                </li>
            --}}
            @else
            {{--
                <li>{{ HTML::linkRoute('register', 'Sign Up') }}</li>
                <li>{{ HTML::linkRoute('login', 'Login') }}</li>
            --}}
            @endif
        </ul>
    </div>
</nav>
