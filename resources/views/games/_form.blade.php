<script type="text/javascript" src="//api.filestackapi.com/filestack.js"></script>

<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('avatar') !!}
    {!! Form::hidden('avatar', null, ['class' => 'form-control']) !!}
    <input type="filepicker" data-fp-apikey="ATv60nyeQQsuErKAD5PGIz" onchange="preview('avatar', event.fpfile.url)">
    <div class="preview"></div>
</div>

<div class="form-group">
    {!! Form::label('cover') !!}
    {!! Form::hidden('cover', null, ['class' => 'form-control']) !!}
    <input type="filepicker" data-fp-apikey="A9vnij5tuSn2WuyPErS9Rz" onchange="preview('cover', event.fpfile.url)">
    <div class="preview"></div>
</div>

<button class="btn" type="submit">
    <span class="ion-ios-download"></span>
    <span>{{ $submitButtonText }}</span>
</button>
