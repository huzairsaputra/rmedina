@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            Show User
        </div>
        <div class="card-body">
            <div class="row">
                @include('admin.users.show_fields')
            </div>
        </div>
    </div>
@endsection
