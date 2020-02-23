{!! Form::open(array('route' => $route, 'method' => $method, 'id' => $formId, 'class' => 'form-horizontal', 'role_id' => 'form')) !!}

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
                    @if( $formId === 'createUser' )
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
                    @endif
                    {!! Form::openFormGroup($prefix .'role_id', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'role_id', Translate::recursive('models.role.singular') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::select($prefix .'role_id', $roles, $input[$prefix .'role_id'], array('class' => 'form-control')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'role_id', $errors) !!}
                    {!! Form::openFormGroup($prefix .'active', $errors, $requiredFields) !!}
                        {!! Form::label($prefix .'active', Translate::recursive('members.active') .': ', array('class' => 'control-label col-sm-3')) !!}
                        <div class="col-sm-4">
                            {!! Form::checkbox($prefix .'active', 'isActive', $input[$prefix .'active'], array('class' => '')) !!}
                        </div>
                    {!! Form::closeFormGroup($prefix .'active', $errors) !!}
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
