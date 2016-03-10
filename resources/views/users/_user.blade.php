<section class="cover-image" style="{{ $user->cover() }}">

    <h1>{{ $user->name }}</h1>
    <a href="profile.html">
        <figure class="profile-image">
            <img src="{{ $user->avatar() }}" />
        </figure>
    </a>

</section>

<section class="liked-games">

    <h2>Games</h2>

    <?php $liked_games = []; ?>

    @if (count($user->games) == 0)

        Some message here?

    @else

        @foreach($games as $game)

            <?php $style = !in_array($game->id, $liked_games) ? 'display: none' : ''; ?>

            <figure class="game-logo" style="{{ $style }}">
                <img src="{{ $game->avatar }}" alt="{{ $game->name }}">
                <figcaption>{{ $game->name }}</figcaption>
            </figure>

        @endforeach

    @endif

</section>