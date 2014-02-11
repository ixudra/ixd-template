<ul class="nav nav-tabs nav-stacked">
    @if( Auth::check() )
    {{--
        <li>{{ HTML::linkRoute('users.index', 'Users') }}</li>
        <li>{{ HTML::linkRoute('availabilities.index', 'Availability') }}</li>
    --}}
    @endif
</ul>