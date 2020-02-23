@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'profile')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.edit', array('model' => 'profile')) }}
@endsection


@section('content')

    {!! Form::open(array('route' => array('profile.update'), 'method' => 'POST', 'id' => 'editProfile', 'class' => 'form-horizontal', 'role' => 'form')) !!}

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
                            <div class="col-sm-4">
                                {!! Form::text($prefix .'last_name', $input[$prefix .'last_name'], array('class' => 'form-control')) !!}
                            </div>
                        {!! Form::closeFormGroup($prefix .'last_name', $errors) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12">&nbsp;</div>

        <div class="align-right">
            {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
            {!! HTML::linkRoute('profile.show', Translate::recursive('common.cancel'), array(), array('class' => 'btn btn-outline-secondary')) !!}
        </div>

    {!! Form::close() !!}

@endsection
