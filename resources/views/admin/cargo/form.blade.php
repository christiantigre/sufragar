<div class="form-group {{ $errors->has('cargo_lista') ? 'has-error' : ''}}">
    <label for="cargo_lista" class="control-label">{{ 'Cargo Lista' }}</label>
    <input class="form-control" name="cargo_lista" type="text" id="cargo_lista" value="{{ $cargo->cargo_lista or ''}}" required>
    {!! $errors->first('cargo_lista', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="control-label">{{ 'Activo' }}</label>
    <div class="radio">
    <label><input name="activo" type="radio" value="1" @if (isset($cargo)) {{ (1 == $cargo->activo) ? 'checked' : '' }} @else {{ 'checked' }} @endif > Yes</label>
</div>
<div class="radio">
    <label><input name="activo" type="radio" value="0" {{ (isset($cargo) && 0 == $cargo->activo) ? 'checked' : '' }}> No</label>
</div>
    {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
