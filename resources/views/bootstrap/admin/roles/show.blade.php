@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $role->present()->fullName }}
@endsection


@section('content-title')
    {{ $role->present()->fullName }}
@endsection


@section('content')

    <div class="row col-md-12">
        {!! Form::open(array('route' => array('admin.roles.show', $role->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.roles.edit', Translate::recursive('common.edit'), 'edit', array($role->id), array('class' => 'btn btn-outline-secondary')) !!}
            {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash-alt', array('class' => 'btn btn-danger')) !!}
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">

            <h3>{{ Translate::recursive('models.user.plural') }}</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ Translate::recursive('members.name') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $role->users as $user )
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{!! HTML::linkRoute('admin.users.show', $user->present()->fullName, array($user->id)) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
