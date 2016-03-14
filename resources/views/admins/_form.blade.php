<div class="form-group">
    {!! Form::label('user_id') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<button class="save-button add" type="submit">
    <span class="ion-archive"></span>
    <p>Add Admin</p>
</button>
