@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">
    <link href="{{ asset('css/switch.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch']) !!}
            <div class="row">
                @include('admin.users.fields')
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script>
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })
        $('.select2').select2();
    </script>
@endpush


