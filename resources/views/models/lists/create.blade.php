@extends('layouts.app')

@section('content')
    <div class="row">
            @if (Auth::guest()) 
                @include('auth.login')
            @else 
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Új lista létrehozása</div>
                <div class="panel-body">

                    @include('core-templates::common.errors')

                    {!! Form::open(['route' => 'lists.store']) !!}

                        @include('models.lists.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
