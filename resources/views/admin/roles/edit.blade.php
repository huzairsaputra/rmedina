@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Role
        </div>
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'patch']) !!}
            <div class="row justify-content-center">
                @include('admin.roles.fields_edit')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
