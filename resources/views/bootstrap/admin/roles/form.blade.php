{!! Form::open(array('route' => $route, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role' => 'form')) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ Translate::recursive('common.titles.basicInformation') }}
                </div>
                <div class="card-body">
                    {!! Form::openFormGroup('key', $errors, $requiredFields) !!}
                        {!! Form::label($prefix . 'key', Translate::recursive('members.key') .': ', array('class' => 'control-label col-md-3')) !!}
                        <div class="col-md-8">
                            {!! Form::text($prefix . 'key', $input[$prefix . 'key'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup('key', $errors) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row col-md-12">&nbsp;</div>

    <div class="align-right">
        {!! Form::submit(Translate::recursive('common.submit'), array('class' => 'btn btn-primary')) !!}
        {!! HTML::linkRoute($redirectUrl, Translate::recursive('common.cancel'), $redirectParameters, array('class' => 'btn btn-outline-secondary')) !!}
    </div>

{!! Form::close() !!}
