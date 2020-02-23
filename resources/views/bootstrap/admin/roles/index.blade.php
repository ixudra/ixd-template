@extends('bootstrap.layouts.master')


@section('page-title')
    {{ Translate::recursive('admin.menu.title.index', array('model' => 'role')) }}
@endsection


@section('content-title')
    {{ Translate::recursive('admin.menu.title.index', array('model' => 'role')) }}
@endsection


@section('content')

    <div class="d-flex flex-row-reverse bd-highlight">
        <p>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#roleFilters" aria-expanded="false" aria-controls="roleFilters">
                <i class="fas fa-sliders-h" aria-hidden="true"></i> {{ Translate::recursive('common.filters') }}
            </button>
            {!! HTML::iconRoute('admin.roles.create', Translate::recursive('common.new'), 'plus', array(), array('class' => 'btn btn-primary')) !!}
        </p>
    </div>

    @include('bootstrap.admin.roles.filter')

    @include('bootstrap.admin.roles.table')

@endsection
