@extends('bootstrap.emails.master')


@section('content-title')
New bug report
@stop


@section('content')

    <div class="well well-large">
        <p>
            Hi Jan,
        </p>
        <p>
            A new issue has been reported on the YourAppName.com website by one of the site administrators:
        </p>
        <h2>Reporter</h2>
        <p>
            {{ $input['name'] }} ({{ $input['email'] }})
        </p>
        <h2>Page</h2>
        <p>
            {{ $input['page'] }}
        </p>
        <h2>Problem description</h2>
        <p>
            {{ $input['description'] }}
        </p>
        <h2>Expected behavior</h2>
        <p>
            {{ $input['expected'] }}
        </p>
        <h2>Actual behavior</h2>
        <p>
            {{ $input['actual'] }}
        </p>
        <h2>Additional info</h2>
        <p>
            {{ $input['info'] }}
        </p>
        <p>
            Please get in touch with the reporter in order to solve the issue as soon as possible.,
        </p>
</div>

@stop