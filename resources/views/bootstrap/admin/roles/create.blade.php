@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'role')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'role')) }}
@endsection


@section('content')

    @include('bootstrap.admin.roles.form', array('route' => array('admin.roles.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createRole', 'redirectUrl' => 'admin.roles.index', 'redirectParameters' => array()))

@endsection
