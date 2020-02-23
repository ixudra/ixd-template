@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'role')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'role')) }}
@endsection


@section('content')

    @include('bootstrap.admin.roles.form', array('route' => array('admin.roles.show', $role->id), 'method' => 'put', 'input' => $input, 'formId' => 'editRole', 'redirectUrl' => 'admin.roles.show', 'redirectParameters' => array($role->id)))

@endsection
