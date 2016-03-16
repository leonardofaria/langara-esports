<section class="cover-image" style="{{ $user->cover() }}">

    <a href="/users/{{ $user->id }}">
        <h1>{{ $user->name }}</h1>
    </a>
    <a href="/users/{{ $user->id }}">
        <figure class="profile-image">
            <img src="{{ $user->avatar() }}" alt="{{ $user->name }}" />
        </figure>
    </a>

</section>

<section class="liked-games">

    <h2>Games</h2>

    @foreach($games as $game)

        <?php $style = !in_array($game->id, $liked_games) ? 'display: none' : ''; ?>

        <a href="/games/{{ $game->id }}" class="game-logo" style="{{ $style }}">
            <img src="{{ $game->avatar }}" alt="{{ $game->name }}">
            {{ $game->name }}
        </a>

    @endforeach

</section>