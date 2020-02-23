@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('authentication.password.change') }}
@endsection


@section('content-title')
    {{ Translate::recursive('authentication.password.change') }}
@endsection


@section('content')

    {!! Form::open(array('route' => 'changePassword', 'method' => 'POST', 'id' => 'changePassword', 'class' => 'form-horizontal', 'role' => 'form')) !!}
        {!! Form::hidden('user_id', $user->id) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ Translate::recursive('common.titles.basicInformation') }}
                    </div>
                    <div class="card-body">
                        {!! Form::openFormGroup($prefix .'password_old', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password_old', Translate::recursive('authentication.password.old') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password_old', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password_old', $errors) !!}
                        {!! Form::openFormGroup($prefix .'password_new', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password_new', Translate::recursive('authentication.password.new') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password_new', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password_new', $errors) !!}
                        {!! Form::openFormGroup($prefix .'password_confirm', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password_confirm', Translate::recursive('authentication.password.confirm') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password_confirm', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password_confirm', $errors) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12">&nbsp;</div>

        <div class="align-right">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-outline-secondary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
