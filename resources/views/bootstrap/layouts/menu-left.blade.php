
<ul class="nav flex-column">
{{--    @if( Auth::check() )--}}
        <li><h5>{{ Translate::recursive('navigation.left.admin') }}</h5></li>
        <li class="nav-item">{!! HTML::linkRoute('log-viewer::dashboard', 'Logs', array(), array('class' => 'nav-link')) !!}</li>
{{--    @endif--}}
</ul>
