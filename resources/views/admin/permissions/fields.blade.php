<!-- Name Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">Cancel</a>
</div>--}}

<div class="col-6">
    <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" id="name" name="name" class="form-control"
               value="{{ old('name', isset($permission) ? $permission->name : '') }}"
               placeholder="Tidak boleh diakhiri .create .read .update .delete" required>
    </div>
    @error('name')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>
<div class="col-6">
    <div class="form-group">
        <label for="name">{{ __('Guard') }}</label>
        <input type="text" class="form-control" value="web" disabled>
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>
