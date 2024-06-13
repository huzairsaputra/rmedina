@can('configs.read')
    <a href="{{ route('admin.configs.show', $id) }}" class='btn btn-sm btn-info'>
        <i class="fa fa-eye"></i>
    </a>
@endcan
@can('configs.update')
    <a href="{{ route('admin.configs.edit', $id) }}" class='btn btn-sm btn-primary'>
        <i class="fa fa-edit"></i>
    </a>
@endcan
@can('configs.delete')
    {!! Form::open(['route' => ['admin.configs.destroy', $id], 'method' => 'DELETE', 'class'=>'form-delete', 'style' => 'display: inline']) !!}
    <a type="submit" href="{{route('admin.configs.destroy',$id)}}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></a>
    {!! Form::close() !!}
@endcan

