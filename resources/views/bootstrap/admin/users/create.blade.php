@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'user')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.new', array('model' => 'user')) }}
@endsection


@section('content')

    @include('bootstrap.admin.users.form', array('route' => array('admin.users.index'), 'method' => 'post', 'input' => $input, 'formId' => 'createUser', 'redirectUrl' => 'admin.users.index', 'redirectParameters' => array()))

@endsection
