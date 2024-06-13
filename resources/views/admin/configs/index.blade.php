@extends('layouts.app')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <h6 class="m-0 font-weight-bold text-primary">Configs</h6>
                </div>
                <div class="col-9">
                    @can('configs.create')
                        <a class="btn btn-success fa-pull-right" href="{{ route('admin.configs.create') }}">
                            Add New
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('admin.configs.table')
            </div>
        </div>
    </div>
@endsection


