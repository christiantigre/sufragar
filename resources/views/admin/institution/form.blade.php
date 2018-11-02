<div class="form-group {{ $errors->has('institucion') ? 'has-error' : ''}}">
    <label for="institucion" class="control-label">{{ 'Institucion' }}</label>
    <input class="form-control" name="institucion" type="text" id="institucion" value="{{ $institution->institucion or ''}}" required>
    {!! $errors->first('institucion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
    <textarea class="form-control" rows="5" name="telefono" type="textarea" id="telefono" required>{{ $institution->telefono or ''}}</textarea>
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ $institution->email or ''}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input class="form-control" name="logo" type="file" id="logo" value="{{ $institution->logo or ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('representante') ? 'has-error' : ''}}">
    <label for="representante" class="control-label">{{ 'Representante' }}</label>
    <input class="form-control" name="representante" type="text" id="representante" value="{{ $institution->representante or ''}}" required>
    {!! $errors->first('representante', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
