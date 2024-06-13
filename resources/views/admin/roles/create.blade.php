@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Create Role
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            <div class="row justify-content-center">
                @include('admin.roles.fields_create')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
