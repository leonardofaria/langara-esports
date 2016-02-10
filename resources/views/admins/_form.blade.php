<div class="form-group">
    {!! Form::label('user_id') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>