<div class="form-group">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $users) !!}
</div>

<button type="submit" class="btn">
    <span class="ion-archive"></span>
    <span>{{ $submitButtonText }}</span>
</button>