@extends('bootstrap.layouts.master')


@section('page-title')
YourAppName
@stop


@section('content-title')
{{ App::make('TranslationHelper')->translateRecursive('admin.menu.title.reportBug') }}
@stop


@section('content')

{{ Form::open(array('url' => 'admin/reportBug', 'method' => 'POST', 'id' => 'reportBugForm', 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="well well-large">
        {{ Form::hidden('name', $input['name']) }}
        {{ Form::hidden('email', $input['email']) }}
        <div class='form-group'>
            {{ Form::label('page', App::make('TranslationHelper')->translateRecursive('admin.field.reportBug.page') .': ', array('class' => 'control-label col-lg-3 large')) }}
            <div class="col-lg-8">
                {{ Form::text('page', $input['page'], array('class' => 'form-control', 'rows' => '8')) }}
            </div>
        </div>
        <div class='form-group'>
            {{ Form::label('description', App::make('TranslationHelper')->translateRecursive('admin.field.reportBug.description') .': ', array('class' => 'control-label col-lg-3')) }}
            <div class="col-lg-8">
                {{ Form::textarea('description', $input['description'], array('class' => 'form-control', 'rows' => '8')) }}
            </div>
        </div>
        <div class='form-group'>
            {{ Form::label('expected', App::make('TranslationHelper')->translateRecursive('admin.field.reportBug.expected') .': ', array('class' => 'control-label col-lg-3')) }}
            <div class="col-lg-8">
                {{ Form::textarea('expected', $input['expected'], array('class' => 'form-control', 'rows' => '8')) }}
            </div>
        </div>
        <div class='form-group'>
            {{ Form::label('actual', App::make('TranslationHelper')->translateRecursive('admin.field.reportBug.actual') .': ', array('class' => 'control-label col-lg-3')) }}
            <div class="col-lg-8">
                {{ Form::textarea('actual', $input['actual'], array('class' => 'form-control', 'rows' => '8')) }}
            </div>
        </div>
        <div class='form-group'>
            {{ Form::label('info', App::make('TranslationHelper')->translateRecursive('admin.field.reportBug.additionalInfo') .': ', array('class' => 'control-label col-lg-3')) }}
            <div class="col-lg-8">
                {{ Form::textarea('info', $input['info'], array('class' => 'form-control', 'rows' => '8')) }}
            </div>
        </div>
    </div>
    <div class="action-button">
        {{ Form::submit(App::make('TranslationHelper')->translateRecursive('common.submit'), array('class' => 'btn btn-primary')) }}
        {{ HTML::linkRoute('admin.index', App::make('TranslationHelper')->translateRecursive('common.cancel'), array(), array('class' => 'btn btn-default')) }}
    </div>
{{ Form::close() }}

@stop

