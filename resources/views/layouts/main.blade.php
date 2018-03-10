@include('layouts._htmlheader')

<div class="page">
    <header class="hero has-dark-background">
        <div class="hero-wrapper">
            @include('layouts._hero__secondary_nav')
            <div class="page-title">
                <div class="container">
                    <h1 class="center">
                        Where do you want to travel?
                    </h1>
                </div>
            </div>
            <div class="background">
                <div class="background-image"
                     style="background-image: url('/images/bg/octavian-rosca-208933-unsplash.jpg');">
                    <img src="/images/bg/octavian-rosca-208933-unsplash.jpg" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="content" id="content">
        <section class="block">
            <div class="container">
                @include('partials.planets.featured')
            </div>
        </section>
        {{--@yield('content')--}}
    </section>

    <footer class="footer">
        @include('layouts._footer__content')
    </footer>
</div>

@include('layouts._htmlfooter')
