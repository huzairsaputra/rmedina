@section('styles')
    <style>
        #key{
            text-transform: uppercase;
        }
    </style>
@endsection
<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Key:') !!}
    {!! Form::text('key', null, ['class' => 'form-control', 'readonly'=> isset($config->id) ?? false,'placeholder'=>'Hanya boleh berisikan alphanumeric (kapital) dan underscore']) !!}
    @error('key')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::text('value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.configs.index') }}" class="btn btn-default">Cancel</a>
</div>
