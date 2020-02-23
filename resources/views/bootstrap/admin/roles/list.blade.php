
    <ul>
    @foreach( $roles as $role )
        <li>{!! HTML::linkRoute('admin.roles.show', $role->name, array($role->id)) !!}</li>
    @endforeach
    </ul>