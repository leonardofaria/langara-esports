<script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>

<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('avatar') !!}
    {!! Form::hidden('avatar', null, ['class' => 'form-control']) !!}
    <input type="filepicker" data-fp-apikey="ATv60nyeQQsuErKAD5PGIz" onchange="document.getElementById('avatar').value = event.fpfile.url">
</div>

<div class="form-group">
    {!! Form::label('cover') !!}
    {!! Form::hidden('cover', null, ['class' => 'form-control']) !!}
    <input type="filepicker" data-fp-apikey="A9vnij5tuSn2WuyPErS9Rz" onchange="document.getElementById('cover').value = event.fpfile.url">
</div>

<button class="save-button add" type="submit">
    <span class="ion-ios-download"></span>
    {{ $submitButtonText }}
</button>
