<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    {!! HTML::linkRoute('index', 'YourAppName', array(), array('class' => 'navbar-brand')) !!}
    @if( Auth::check() )
        {!! HTML::linkRoute('admin.index', 'Admin dashboard', array(), array('class' => 'navbar-brand')) !!}
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav d-sm-block d-md-none">
            @if( Auth::check() )
                @if( Auth::user()->isAdmin() )
                    <li class="nav-item">{!! HTML::linkRoute('admin.users.index', Translate::recursive('admin.menu.title.index', array('model' => 'user')), array(), array('class' => 'nav-link')) !!}</li>
                    <hr />
                    <li class="nav-item">{!! HTML::linkRoute('admin.roles.index', Translate::recursive('admin.menu.title.index', array('model' => 'role')), array(), array('class' => 'nav-link')) !!}</li>
                    <li class="nav-item">{!! HTML::linkRoute('log-viewer::dashboard', 'Logs', array(), array('class' => 'nav-link')) !!}</li>
                @endif
            @endif
        </ul>
        <ul class="navbar-nav flex-row ml-md-auto d-md-flex">
            @if( Auth::check() )
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->present()->fullName }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        {!! HTML::linkRoute('profile.show', Translate::recursive('authentication.profile'), array(), array('class' => 'dropdown-item')) !!}
                        <div class="dropdown-divider"></div>
                        {!! HTML::linkRoute('changeEmail', Translate::recursive('authentication.email.change'), array(), array('class' => 'dropdown-item')) !!}
                        {!! HTML::linkRoute('changePassword', Translate::recursive('authentication.password.change'), array(), array('class' => 'dropdown-item')) !!}
                        <div class="dropdown-divider"></div>
                        {!! HTML::linkRoute('logout', Translate::recursive('authentication.logout'), array(), array('class' => 'dropdown-item')) !!}
                    </div>
                </li>
            @else
                <li class="nav-item">
                    {!! HTML::linkRoute('login', Translate::recursive('authentication.login'), array(), array('class' => 'nav-link')) !!}
                </li>
            @endif
        </ul>
    </div>
</nav>
