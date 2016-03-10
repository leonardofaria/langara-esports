@extends('home')

@section('content')

    <div class="main-wrapper home-page">

        <header>

            <div class="header-background">

                <figure class="logo">
                    <img src="images/logoColor.svg" alt="">
                </figure>

                <div class="tagline">

                    <h1>The community For Gamers By Gamers</h1>
                    <div class="sign-in">
                        <a href="{{ route('social.login', ['facebook']) }}" class="facebook-button">
                            <i class="fa fa-facebook-official"></i>
                            <p>Sign in using Facebook</p>
                        </a>
                    </div>
                </div>

            </div>

            <a href="#" class="scroll-down">
                <h2>Scroll to learn more</h2>
                <i class="fa fa-angle-double-down"></i>
            </a>

        </header>

        <section class="app-introduction max-width">

            <div class="introduction-wrapper">
                <h2>Introduction</h2>
                <h3>We connect you to other student gamers, so you never have to play alone</h3>
            </div>

        </section>

    </div>

@stop