
    <ul>
    @foreach( $users as $user )
        <li>{!! HTML::linkRoute('admin.users.show', $user->name, array($user->id)) !!}</li>
    @endforeach
    </ul>