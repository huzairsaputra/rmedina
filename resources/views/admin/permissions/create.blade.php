@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Permission
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.permissions.store', 'enctype'=>'multipart/form-data']) !!}
            <div class="row">
                @include('admin.permissions.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
