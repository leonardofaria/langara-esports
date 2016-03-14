@if ($errors->any())
    <div class="validation">
        <b>Check the errors below:</b>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
