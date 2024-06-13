@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-4 order-lg-2">
            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <a href="#" data-toggle="modal" data-target="#photomodal">
                        <img src="{{route('admin.image', ['path' => 'avatar', 'filename'=>Auth::user()->getImageAttribute()])}}"
                             onmouseover="this.src='{{asset('img/image-hover.png')}}'"
                             onmouseout="this.src='{{route('admin.image', ['path' => 'avatar', 'filename'=>Auth::user()->getImageAttribute()])}}'"
                             class="rounded-circle" alt="user-image" width="180px" height="180px">
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{  Auth::user()->fullName }}</h5>
                                @foreach(Auth::user()->roles as $role)
                                    <span class='badge badge-info'>{{$role->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">{{Auth::user()->roles()->count()}}</span>
                                <span class="description">Roles</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                <span class="heading">{{Auth::user()->getAllPermissions()->count()}}</span>
                                <span class="description">Permissions</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-profile-stats">
                                {{--<span class="heading">{{Auth::user()->created_at->diffForHumans()}}</span>--}}
                                <span class="heading">{{Auth::user()->created_at->format('M. Y')}}</span>
                                <span class="description">Since</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                </div>
                <div class="card-body">
                    <form class="mb-4" method="POST" action="{{ route('admin.profile.update') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="last_name">Last name</label>
                                        <input type="text" id="last_name" class="form-control" name="last_name" placeholder="Last name" value="{{ old('last_name', Auth::user()->last_name) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com" value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form class="mt-4" action="{{route('admin.profile.change_password')}}" method="POST">
                        {{csrf_field()}}
                        <h6 class="heading-small text-muted mb-4">Change Password</h6>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="current_password">Current password</label>
                                    <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="new_password">New password</label>
                                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New password">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="confirm_password">Confirm password</label>
                                    <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="photomodal" tabindex="-1" role="dialog" aria-labelledby="photomodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.profile.update_avatar')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <img id="photopreview" src="{{route('admin.image', ['path' => 'avatar', 'filename'=>Auth::user()->getImageAttribute()])}}" class="rounded-circle" alt="user-image" width="200px" height="200px">
                        <input type="file" name="photo" id="imgInp" accept="image/*">
                    </div>
                    <div class="modal-footer">
                        @if(!empty(Auth::user()->photo))<input id="delete" type="submit" name="update_delete" value="Delete" class="btn btn-danger">@endif
                        <input id="update" type="submit" name="update_delete" value="Save changes" class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photopreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#imgInp").change(function() {
            readURL(this);
        });

        $('#update').on('click', function () {
            $('#imgInp').attr('required', true);
        })
        $('#delete').on('click', function () {
            $('#imgInp').attr('required', false);
        })
    </script>
@endpush
