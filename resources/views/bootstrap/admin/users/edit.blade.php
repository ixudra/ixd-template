@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'user')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'user')) }}
@endsection


@section('content')

    @include('bootstrap.admin.users.form', array('route' => array('admin.users.show', $user->id), 'method' => 'put', 'input' => $input, 'formId' => 'editUser', 'redirectUrl' => 'admin.users.show', 'redirectParameters' => array($user->id)))

@endsection
