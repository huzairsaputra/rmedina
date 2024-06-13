@can('roles.read')
    <a href="{{ route('admin.roles.show', $id) }}" class='btn btn-sm btn-info'>
        <i class="fa fa-eye"></i>
    </a>
@endcan
@can('roles.update')
    <a href="{{ route('admin.roles.edit', $id) }}" class='btn btn-sm btn-primary'>
        <i class="fa fa-edit"></i>
    </a>
@endcan
@can('roles.delete')
    {!! Form::open(['route' => ['admin.roles.destroy', $id], 'method' => 'DELETE', 'class'=>'form-delete', 'style' => 'display: inline']) !!}
    <a type="submit" href="{{route('admin.roles.destroy',$id)}}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></a>
    {!! Form::close() !!}
@endcan
