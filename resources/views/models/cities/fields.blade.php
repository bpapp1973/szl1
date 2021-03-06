<!-- Counties Id Field -->
<div class="form-group{{ $errors->has('counties_id') ? ' has-error' : '' }}">
	{!! Form::label('counties_id', 'Counties Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    	{!! Form::number('counties_id', null, ['class' => 'form-control']) !!}
        @if ($errors->has('counties_id'))
            <span class="help-block">
                <strong>{{ $errors->first('counties_id') }}</strong>
            </span>
        @endif
    </div>
</div>


<!-- Name Field -->
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    	{!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Mentés', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cities.index') !!}" class="btn btn-default">Mégsem</a>
</div>
