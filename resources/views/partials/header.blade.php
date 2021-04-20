<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">@lang('blog.welcome')</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Sample Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contato') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    @section('header')
                        <h1>Laravel Blade</h1>
                        <span class="subheading">Novidades de Tecnologia</span>
                    @show
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        @if (session('success'))
            <p class="alert-success text-center col-md-12" style="margin-bottom:20px;">
                {{ session('success') }}
            </p>
        @endif
        @if (session('error'))
            <div class="alert-error text-center col-md-12" style="margin-bottom:20px;">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
