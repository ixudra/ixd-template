@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('authentication.register') }}
@endsection


@section('content-title')
    {{ Translate::recursive('authentication.register') }}
@endsection


@section('content')

    {!! Form::open(array('route' => 'register', 'method' => 'POST', 'id' => 'resetPassword', 'class' => 'form-horizontal', 'role' => 'form')) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ Translate::recursive('common.titles.basicInformation') }}
                    </div>
                    <div class="card-body">
                        {!! Form::openFormGroup($prefix .'first_name', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'first_name', Translate::recursive('members.first_name') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'first_name', $input[$prefix .'first_name'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'first_name', $errors) !!}
                        {!! Form::openFormGroup($prefix .'last_name', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'last_name', Translate::recursive('members.last_name') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'last_name', $input[$prefix .'last_name'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'last_name', $errors) !!}
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
                        {!! Form::openFormGroup($prefix .'password_confirm', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password_confirm', Translate::recursive('authentication.password.confirm') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password_confirm', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password_confirm', $errors) !!}
                        {!! Form::openFormGroup($prefix .'terms', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'terms', Translate::recursive('authentication.terms') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-4">
                                {!! Form::checkbox('terms', 'terms', $input['terms']) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'terms', $errors) !!}
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
