{{--@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Permission
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.permissions.show_fields')
                </div>
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection--}}

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Show Permission
        </div>
        <div class="card-body">
            <div class="row mb-2">
                @include('admin.permissions.show_fields')
            </div>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ route('admin.permissions.index') }}">
                Back
            </a>
        </div>
    </div>
@endsection

