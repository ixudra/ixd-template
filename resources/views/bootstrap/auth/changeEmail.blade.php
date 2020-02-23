@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('authentication.email.change') }}
@endsection


@section('content-title')
    {{ Translate::recursive('authentication.email.change') }}
@endsection


@section('content')

    {!! Form::open(array('route' => 'changeEmail', 'method' => 'POST', 'id' => 'changeEmail', 'class' => 'form-horizontal', 'role' => 'form')) !!}
        {!! Form::hidden('user_id', $user->id) !!}

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ Translate::recursive('common.titles.basicInformation') }}
                    </div>
                    <div class="card-body">
                        {!! Form::openFormGroup($prefix .'email_old', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'email_old', Translate::recursive('authentication.email.old') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'email_old', $input[$prefix .'email_old'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'email_old', $errors) !!}
                        {!! Form::openFormGroup($prefix .'email_new', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'email_new', Translate::recursive('authentication.email.new') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'email_new', $input[$prefix .'email_new'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'email_new', $errors) !!}
                        {!! Form::openFormGroup($prefix .'email_confirm', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'email_confirm', Translate::recursive('authentication.email.confirm') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::text($prefix .'email_confirm', $input[$prefix .'email_confirm'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'email_confirm', $errors) !!}
                        {!! Form::openFormGroup($prefix .'password', $errors, $requiredFields) !!}
                            {!! Form::label($prefix .'password', Translate::recursive('members.password') .': ', array('class' => 'control-label col-sm-3')) !!}
                            <div class="col-sm-6">
                                {!! Form::password($prefix .'password', array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'password', $errors) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12">&nbsp;</div>

        <div class="align-right">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('admin.users.show', Translate::recursive('common.cancel'), array($user->id), array('class' => 'btn btn-outline-secondary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
