<div class="form-group {{ $errors->has('curso') ? 'has-error' : ''}}">
    <label for="curso" class="control-label">{{ 'Curso' }}</label>
    <input class="form-control" name="curso" type="text" id="curso" value="{{ $course->curso or ''}}" required>
    {!! $errors->first('curso', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activo') ? 'has-error' : ''}}">
    <label for="activo" class="control-label">{{ 'Activo' }}</label>
    <div class="radio">
    <label><input name="activo" type="radio" value="1" @if (isset($course)) {{ (1 == $course->activo) ? 'checked' : '' }} @else {{ 'checked' }} @endif> Yes</label>
</div>
<div class="radio">
    <label><input name="activo" type="radio" value="0" {{ (isset($course) && 0 == $course->activo) ? 'checked' : '' }}> No</label>
</div>
    {!! $errors->first('activo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
