@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Show Config
        </div>
        <div class="card-body">
            <div class="row mb-2">
                @include('admin.configs.show_fields')
            </div>
            <a href="{{ route('admin.configs.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection
