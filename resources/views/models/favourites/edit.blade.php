@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" style="padding-top: 10em">
    <div class="container">
        <div class="row">
            @if (Auth::guest()) @include('auth.login') @else @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Favourites szerkesztése</div>
                <div class="panel-body">

                    @include('core-templates::common.errors')

                    {!! Form::model($favourites, ['route' => ['favourites.update', $favourites->id], 'method' => 'patch']) !!}

                    @include('models.favourites.editfields')

                    {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
