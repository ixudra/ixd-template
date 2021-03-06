@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('authentication.resetPassword.title') }}
@endsection


@section('content-title')
    {{ Translate::recursive('authentication.resetPassword.title') }}
@endsection


@section('content')

    {!! Form::open(array('route' => 'resetPassword', 'method' => 'POST', 'id' => 'resetPassword', 'class' => 'form-horizontal', 'role' => 'form')) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ Translate::recursive('common.titles.basicInformation') }}
                    </div>
                    <div class="card-body">
                        {!! Form::openFormGroup('password', $errors, $requiredFields) !!}
                            {!! Form::label('password', Translate::recursive('authentication.password.new') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password('password', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup('name', $errors) !!}
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
