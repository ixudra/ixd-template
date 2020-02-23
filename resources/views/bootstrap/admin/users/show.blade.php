@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $user->present()->fullName }}
@endsection


@section('content-title')
    {{ $user->present()->fullName }}
@endsection


@section('content')

    <div class="row col-md-12">
        {!! Form::open(array('route' => array('admin.users.show', $user->id), 'method' => 'delete')) !!}
            {!! HTML::iconRoute('admin.users.edit', Translate::recursive('common.edit'), 'edit', array($user->id), array('class' => 'btn btn-outline-secondary')) !!}
            @if( Auth::user()->isAdmin() )
                {!! Form::iconSubmit(Translate::recursive('common.delete'), 'trash-alt', array('class' => 'btn btn-danger')) !!}
            @endif
            @if( Auth::user()->id !== $user->id && $user->isActive() && !$user->isAdmin() )
                {!! HTML::iconRoute('admin.users.logInAsUser', Translate::recursive('users.logInAsUser'), 'sign-in-alt', array($user->id), array('class' => 'btn btn-primary')) !!}
            @endif
        {!! Form:: close() !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-md-4">{{ Translate::recursive('members.email') }}:</div>
                        <div class="col-md-8">{{ $user->email }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4">{{ Translate::recursive('models.role.singular') }}:</div>
                        <div class="col-md-8">{{ $user->roles()->first()->present()->fullName }}</div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4">{{ Translate::recursive('members.active') }}:</div>
                        <div class="col-md-8">{{ $user->present()->isActive }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
