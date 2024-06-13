@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Show Role
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                @include('admin.roles.show_fields')
            </div>
        </div>
    </div>
@endsection
