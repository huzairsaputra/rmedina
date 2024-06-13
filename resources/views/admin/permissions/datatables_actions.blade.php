@can('permissions.read')
    <a href="{{ route('admin.permissions.show', $id) }}" class='btn btn-sm btn-info'>
        <i class="fa fa-eye"></i>
    </a>
@endcan
@can('permissions.update')
    <a href="{{ route('admin.permissions.edit', $id) }}" class='btn btn-sm btn-primary'>
        <i class="fa fa-edit"></i>
    </a>
@endcan
@can('permissions.delete')
    {!! Form::open(['route' => ['admin.permissions.destroy', $id], 'method' => 'DELETE', 'class'=>'form-delete', 'style' => 'display: inline']) !!}
    <a type="submit" href="{{route('admin.permissions.destroy',$id)}}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></a>
    {!! Form::close() !!}
@endcan
