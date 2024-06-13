@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create Config
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.configs.store']) !!}
                <div class="row">
                    @include('admin.configs.fields')
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

