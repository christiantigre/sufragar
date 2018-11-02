<div class="form-group {{ $errors->has('paralelo') ? 'has-error' : ''}}">
    <label for="paralelo" class="control-label">{{ 'Paralelo' }}</label>
    <input class="form-control" name="paralelo" type="text" id="paralelo" value="{{ $paralelo->paralelo or ''}}" required>
    {!! $errors->first('paralelo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="control-label">{{ 'Activo' }}</label>
    <div class="radio">
    <label><input name="activo" type="radio" value="1" @if (isset($paralelo)) {{ (1 == $paralelo->activo) ? 'checked' : '' }} @else {{ 'checked' }} @endif > Yes</label>
</div>
<div class="radio">
    <label><input name="activo" type="radio" value="0" {{ (isset($paralelo) && 0 == $paralelo->activo) ? 'checked' : '' }}> No</label>
</div>
    {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
