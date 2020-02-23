
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ Translate::recursive('members.name') }}</th>
                    <th>{{ Translate::recursive('members.key') }}</th>
                    <th>{{ Translate::recursive('common.actions') }}</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $roles as $role )
                <tr>
                    <td>{!! HTML::linkRoute('admin.roles.show', $role->present()->fullName, array($role->id)) !!}</td>
                    <td>{!! HTML::linkRoute('admin.roles.show', $role->key, array($role->id)) !!}</td>
                    <td class="table-small">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                {{ Translate::recursive('common.actions') }} <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>{!! HTML::iconRoute('admin.roles.edit', Translate::recursive('common.edit'), 'edit', array($role->id), array('class' => 'btn btn-actions pull-left')) !!}</li>
                                <li>{!! HTML::iconRoute('admin.roles.show', Translate::recursive('common.delete'), 'trash-alt', array($role->id, '_token' => csrf_token()), array('class' => 'btn btn-actions pull-left rest', 'data-method' => 'DELETE')) !!}</li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $roles->render() !!}
    </div>
