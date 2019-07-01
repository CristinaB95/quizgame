<header class="header-section font-lobster">
<nav class=" header-wrap navbar navbar-expand-sm text-navi-blue">
    
        <div class="logo">
            <a class="logo-image text-navi-blue" href="/">QuiZ Game</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon d-flex align-items-center text-navi-blue">
                <i class="fas fa-bars mx-auto"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav nav nav-bar ml-auto justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-navi-blue" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navi-blue" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-navi-blue" href="/contact-page">Contact</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-navi-blue" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown d-none d-sm-block ">
                        <a class="nav-link dropdown-toggle text-navi-blue" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item nav-link text-navi-blue" href="/profile">View Profile</a>
                            <a class="nav-link text-navi-blue dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <!-- visible only on hamburger menu -->
                    <li class="nav-item d-sm-none">
                        <a class="dropdown-item nav-link text-navi-blue" href="/profile">View Profile</a>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link text-navi-blue dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
</nav>
</header>