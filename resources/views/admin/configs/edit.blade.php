@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Edit Config
        </div>
        <div class="card-body">
            {!! Form::model($config, ['route' => ['admin.configs.update', $config->id], 'method' => 'patch']) !!}
                <div class="row">
                    @include('admin.configs.fields')
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
