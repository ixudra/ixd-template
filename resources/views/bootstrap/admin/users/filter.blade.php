
<div id="userFilters" class="collapse">
    {!! Form::open(array('route' => array('admin.users.filter'), 'method' => 'POST', 'id' => 'filterUsers')) !!}
        <div class="form-row">
            <div class="col-md-4 mb-3">
                {!! Form::label('query', Translate::recursive('common.query') .': ') !!}
                {!! Form::text('query', $input['query'], array('placeholder' => Translate::recursive('common.query'), 'class' => 'form-control', 'id' => 'query')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('active', Translate::recursive('members.active') .': ', array('class' => '')) !!}
                {!! Form::select('active', $activeOptions, $input['active'], array('class' => 'form-control')) !!}
            </div>
            <div class="col-md-4 mb-3">
                {!! Form::label('search','&nbsp;') !!}
                <div class="form-group">
                    {!! Form::iconSubmit(Translate::recursive('common.search'), 'search', array('class' => 'btn btn-primary align-bottom')) !!}
                    {!! HTML::iconRoute('admin.users.index', Translate::recursive('common.clear'), 'times', array(), array('class' => 'btn btn-outline-secondary')) !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
