<!-- Users Id Field -->
<div class="form-group{{ $errors->has('users_id') ? ' has-error' : '' }}">
	{!! Form::label('users_id', 'Users Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    	{!! Form::number('users_id', null, ['class' => 'form-control']) !!}
        @if ($errors->has('users_id'))
            <span class="help-block">
                <strong>{{ $errors->first('users_id') }}</strong>
            </span>
        @endif
    </div>
</div>


<!-- Ads Id Field -->
<div class="form-group{{ $errors->has('ads_id') ? ' has-error' : '' }}">
	{!! Form::label('ads_id', 'Ads Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    	{!! Form::number('ads_id', null, ['class' => 'form-control']) !!}
        @if ($errors->has('ads_id'))
            <span class="help-block">
                <strong>{{ $errors->first('ads_id') }}</strong>
            </span>
        @endif
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Mentés', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('favourites.index') !!}" class="nav-link btn btn-warning-outline btn-warning">Mégsem</a>
</div>
