@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('authentication.login') }}
@endsection


@section('content-title')
    {{ Translate::recursive('authentication.login') }}
@endsection


@section('content')

    {!! Form::open(array('route' => 'login', 'method' => 'POST', 'id' => 'login', 'class' => 'form-horizontal', 'role' => 'form')) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ Translate::recursive('common.titles.basicInformation') }}
                    </div>
                    <div class="card-body">
                        {!! Form::openFormGroup($prefix .'email', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'email', Translate::recursive('members.email') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'email', $input[$prefix .'email'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'email', $errors) !!}
                        {!! Form::openFormGroup($prefix .'password', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password', Translate::recursive('members.password') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password', $errors) !!}
                        {!! Form::openFormGroup($prefix .'remember', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'remember', Translate::recursive('authentication.remember') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-4">
                                {!! Form::checkbox('remember', 'remember', $input['remember']) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'remember', $errors) !!}
                        {!! Form::openFormGroup($prefix .'resetPassword', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'resetPassword', '&nbsp;', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-9">
                                {!! HTML::linkRoute('resetPassword', Translate::recursive('authentication.resetPassword.title')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'resetPassword', $errors) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12">&nbsp;</div>

        <div class="align-right">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('index', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-outline-secondary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
