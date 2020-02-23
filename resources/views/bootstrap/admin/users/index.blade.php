@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.index', array('model' => 'user')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.index', array('model' => 'user')) }}
@endsection


@section('content')

    <div class="d-flex flex-row-reverse bd-highlight">
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#userFilters" aria-expanded="false" aria-controls="userFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.users.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('bootstrap.admin.users.filter')

    @include('bootstrap.admin.users.table')

@endsection
