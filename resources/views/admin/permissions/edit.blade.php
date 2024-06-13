@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Permission
        </div>
        <div class="card-body">
            {!! Form::model($permission, ['route' => ['admin.permissions.update', $permission->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('admin.permissions.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
