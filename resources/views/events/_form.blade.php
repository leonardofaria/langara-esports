<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('started_at') !!}
    {!! Form::text('started_at', date('Y-m-d H:i')) !!}
</div>

<div class="form-group">
    {!! Form::label('ended_at') !!}
    {!! Form::text('ended_at', date('Y-m-d H:i')) !!}
</div>

@if (Auth::user()->admin()->first())
<div class="form-group">
    {!! Form::label('official') !!}
    {{ Form::checkbox('official', 1, true) }}
</div>
@endif

<div class="form-group">
    {!! Form::label('game_id') !!}
    {!! Form::select('game_id', $games, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

<script type="text/javascript" src="/js/flatpickr.min.js"></script>
<script type="text/javascript">
    var started_at = flatpickr("#started_at", { dateFormat: 'Y-m-d', timeFormat: 'H:i', enableTime: true, minDate: new Date() });
    var ended_at = flatpickr("#ended_at", { dateFormat: 'Y-m-d', timeFormat: 'H:i', enableTime: true, minDate: new Date() });

    started_at.set("onChange", function(d){ var temp = new Date(d); temp.setDate(d.getDate()-1); ended_at.set( "minDate" , temp ); });
</script>
