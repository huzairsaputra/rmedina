@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Permissions
        </div>

        <div class="card-body">
            <form action="{{ route("admin.permissions.store_complex") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center text-center">
                    <div class="col-sm-4">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Name * (unique)</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $permission ?? '') }}" required>
                            @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group form-check">
                            <input type="checkbox" name="check_crud" class="form-check-input" id="checklistcrud">
                            <label class="form-check-label pb-2" for="checklistcrud">CRUD Permissions</label>
                            <div class="row">
                                <input type="text" id="create" name="crud[]" class="form-control col-sm-2 mr-5" value="" readonly>
                                <input type="text" id="read" name="crud[]" class="form-control col-sm-2 mr-5" value="" readonly>
                                <input type="text" id="update" name="crud[]" class="form-control col-sm-2 mr-5" value="" readonly>
                                <input type="text" id="delete" name="crud[]" class="form-control col-sm-2" value="" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="check_controller" class="form-check-input" id="checklistcontroller">
                            <label class="form-check-label pb-2" for="checklistcontroller">Controller</label>
                            <input type="text" id="controller" name="name_controller" class="form-control" value="" placeholder="Admin/TestsController untuk di dalam folder admin">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="check_view" class="form-check-input" id="checklistview">
                            <label class="form-check-label pb-2" for="checklistview">View</label>
                            <input type="text" id="view" name="name_view" class="form-control" value="" placeholder="admin.tests untuk di dalam folder admin">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="check_model" class="form-check-input" id="checklistmodel">
                            <label class="form-check-label pb-2" for="checklistmodel">Model</label>
                            <input type="text" id="model" name="name_model" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-check">
                            <input type="checkbox" name="check_resource" class="form-check-input" id="checklistresource">
                            <label class="form-check-label pb-2" for="checklistresource">Resource ?</label>
                            <input type="text" id="route"  class="form-control" value="View+controller method index,create,store,edit,update,show and destroy" disabled>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Save">
                    <a href="{{route('admin.permissions.index')}}" class="btn btn-default">Cancel</a>
                </div>
            </form>


        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                $input = $('#name').val().trim();

                $inputLowerCase = $input.toLowerCase();
                $('#create').val($inputLowerCase+'.create');
                $('#read').val($inputLowerCase+'.read');
                $('#update').val($inputLowerCase+'.update');
                $('#delete').val($inputLowerCase+'.delete');

                $('#view').val($inputLowerCase);

                $inputUpperFirst = $inputLowerCase.charAt(0).toUpperCase()+$inputLowerCase.slice(1);
                $('#controller').val($inputUpperFirst+'Controller');
                $('#model').val($inputUpperFirst);
            });
        });
    </script>
@endpush
