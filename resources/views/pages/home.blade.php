@extends('home')

@section('content')

    <div class="main-wrapper home-page">

        <header class="home-header">

            <div class="header-background">

                <div class="logo">
                    <img src="/images/logoColor.svg" alt="Langara">
                </div>

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

        <section class="app-introduction ">

            <div class="introduction-wrapper">
                <h3>We connect you to other student gamers, so you never have to play alone</h3>
            </div>

        </section>

        <section class="how-it-works">

            <div class="how-it-works-wrapper max-width">
                <h2>How does it work?</h2>
                <div class="step-1">
                    <h3>1</h3>
                    <div class="description">
                        <div class="icon"><span class="ion-social-facebook"></span></div>
                        <div>
                            <h3>Sign in using Facebook</h3>
                            <p>No need to create a new account. Hassle free login using your Facebook id.</p>
                        </div>
                    </div>
                </div>

                <div class="step-2">
                    <h3>2</h3>
                    <div class="description">
                        <div class="icon"><span class="ion-ios-game-controller-b"></span></div>
                        <div>
                            <h3>Choose the games you play</h3>
                            <p>Add your favorite games to your profile. Your "My Events" tab will only show events from people playing the same games as you.</p>
                        </div>
                    </div>
                </div>

                <div class="step-3">
                    <h3>3</h3>
                    <div class="description">
                        <div class="icon"><span class="ion-android-add-circle"></span></div>
                        <div>
                            <h3>Add Event</h3>
                            <p>Make it easier for others to find you by creating a new event and letting them know about your preferred play timings. When you create a new gaming event, it shows in everyone's profile who has liked that game.</p>
                        </div>
                    </div>
                </div>

                <div class="step-4">
                    <h3>4</h3>
                    <div class="description">
                        <div class="icon"><span class="ion-person"></span></div>
                        <div>
                            <h3>My Events</h3>
                            <p>Always stay up to date with the current gaming events, as it becomes super easy to find fellow student gamers with similar interests.</p>
                        </div>
                    </div>
                </div>

                <div class="step-5">
                    <h3>5</h3>
                    <div class="description">
                        <div class="icon"><span class="ion-earth"></span></div>
                        <div>
                            <h3>All Events</h3>
                            <p>Keep track of all the gaming events happening even if you haven't liked those games. </p>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </div>

@stop