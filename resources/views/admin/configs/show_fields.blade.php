<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $config->id }}</p>
</div>


<!-- Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key', 'Key:') !!}
    <p>{{ $config->key }}</p>
</div>


<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $config->value }}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $config->created_at }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $config->updated_at }}</p>
</div>


