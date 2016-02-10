<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('played_at') !!}
    {!! Form::text('played_at', date('Y-m-d H:i'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('game_id') !!}
    {!! Form::select('game_id', $games, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
