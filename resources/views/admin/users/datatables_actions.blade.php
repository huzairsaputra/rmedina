@php
    $isSuperAdmin = \Illuminate\Support\Facades\Auth::user()->is_super_admin;
    $isHasSuperAdminRole = in_array(\App\Models\Role::SUPER_ADMIN, array_column($roles, 'name'));
    $authId = \Illuminate\Support\Facades\Auth::user()->id;
@endphp

@can('users.read')
    <a href="{{ route('admin.users.show', $id) }}" class='btn btn-sm btn-info'>
        <i class="fa fa-eye"></i>
    </a>
@endcan
@if(($isHasSuperAdminRole && $isSuperAdmin && $id==$authId) || !$isHasSuperAdminRole)
    @can('users.update')
        <a href="{{ route('admin.users.edit', $id) }}" class='btn btn-sm btn-primary'>
            <i class="fa fa-edit"></i>
        </a>
    @endcan
    @can('users.delete')
        {!! Form::open(['route' => ['admin.users.destroy', $id], 'method' => 'DELETE', 'class'=>'form-delete', 'style' => 'display: inline']) !!}
        <a type="submit" href="{{route('admin.users.destroy',$id)}}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></a>
        {!! Form::close() !!}
    @endcan
@endif
