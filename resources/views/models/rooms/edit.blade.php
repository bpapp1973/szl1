@extends('layouts.app')
@section('scripts')
@endsection
@section('content')
<div id="page-content-wrapper" style="padding-top: 10em">
    <div class="container">
        <div class="row">
            @if (Auth::guest()) 
                @include('auth.login')
            @else 
            <div class="panel panel-default">
                <div class="panel-heading">Helyiség szerkesztése</div>
                <div class="panel-body">

                    @include('core-templates::common.errors')

                    {!! Form::model($rooms, ['route' => ['rooms.update', $rooms->id], 'method' => 'patch']) !!}

                    @include('models.rooms.editfields')
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Mentés', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('ads.index') !!}" class="btn btn-default">Mégsem</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

