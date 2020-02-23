
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('members.email') }}</th>
                    <th>{{ Translate::recursive('models.role.singular') }}</th>
                    <th>{{ Translate::recursive('members.active') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $users as $user )
                <tr>
                    <td>{!! HTML::linkRoute('admin.users.show', $user->present()->fullName, array($user->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.users.show', $user->email, array($user->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.users.show', $user->roles()->first()->present()->fullName, array($user->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.users.show', $user->present()->isActive, array($user->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.users.edit', Translate::recursive('common.edit'), 'edit', array($user->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                @if( Auth::user()->isAdmin() )
                                    <li>{!! HTML::iconRoute('admin.users.show', Translate::recursive('common.delete'), 'trash-alt', array($user->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                                    <li>{!! HTML::iconRoute('admin.users.logInAsUser', Translate::recursive('users.logInAsUser'), 'sign-in-alt', array($user->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                @endif
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->render() !!}
    </div>
