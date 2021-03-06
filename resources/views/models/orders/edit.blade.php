@extends('layouts.app')

@section('content')
<div id="page-content-wrapper" style="padding-top: 10em">
    <div class="container mbr-section-full">
    <div style="padding: 3em; background-color: #ffffff">
        <div class="row">
            @if (Auth::guest()) @include('auth.login') @else @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading">Orders szerkesztése</div>
                <div class="panel-body">

                    @include('core-templates::common.errors')

                    {!! Form::model($orders, ['route' => ['orders.update', $orders->id], 'method' => 'patch']) !!}

                    @include('models.orders.editfields')

                    {!! Form::close() !!}
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection

