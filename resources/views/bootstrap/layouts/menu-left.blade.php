
<ul class="nav flex-column">
    @if( Auth::check() )
        @if( Auth::user()->isAdmin() )
            <li><h5>{{ Translate::recursive('navigation.left.admin') }}</h5></li>
            <li class="nav-item">{!! HTML::linkRoute('admin.users.index', Translate::recursive('admin.menu.title.index', array('model' => 'user')), array(), array('class' => 'nav-link')) !!}</li>
            <li class="nav-item">{!! HTML::linkRoute('admin.roles.index', Translate::recursive('admin.menu.title.index', array('model' => 'role')), array(), array('class' => 'nav-link')) !!}</li>
            <hr />
            <li class="nav-item">{!! HTML::linkRoute('log-viewer::dashboard', 'Logs', array(), array('class' => 'nav-link')) !!}</li>
        @endif
    @endif
</ul>
