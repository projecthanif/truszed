<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="/" class="logo m-0 float-start"@style('text-decoration:none;') wire:navigate>Truszed properties</a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <li class="active"><a href="/" wire:navigate>Home</a></li>
                    <li class="has-children active">
                        <a href="{{ route('properties') }}" wire:navigate>Properties</a>
                        <ul class="dropdown">
                            <li><a href="#">Buy Property</a></li>
                            <li><a href="{{route('agent.register')}}">Sell Property</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="{{ route('services') }}" wire:navigate.hover>Services</a></li>
                    <li class="active"><a href="{{ route('about') }}" wire:navigate>About</a></li>
                    <li class="active"><a href="{{ route('contact') }}" wire:navigate>Contact Us</a></li>
                </ul>
                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
