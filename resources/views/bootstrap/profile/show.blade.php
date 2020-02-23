@extends('bootstrap.layouts.master')


@section('page-title')
    {{ $user->present()->fullName }}
@endsection


@section('content-title')
    {{ $user->present()->fullName }}
@endsection


@section('content')

    <div class="row col-md-12">
        {!! HTML::iconRoute('profile.edit', Translate::recursive('common.edit'), 'edit', array(), array('class' => 'btn btn-outline-secondary')) !!}
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    <div class="row col-md-12">
                        <div class="col-md-4">{{ Translate::recursive('members.email') }}:</div>
                        <div class="col-md-8">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
