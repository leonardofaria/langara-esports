<div class="form-group">
    {!! Form::label('user_id', 'User') !!}
    {!! Form::select('user_id', $users) !!}
</div>

<button class="save-button add" type="submit">
    <span class="ion-archive"></span>
    <p>Add Admin</p>
</button>
