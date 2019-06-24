<header class="header-section font-lobster">
    <div class="header-wrap d-flex justify-content-between text-navi-blue">
        <div class="logo">
            <a class="logo-image text-navi-blue" href="/">QuiZ Game</a>
        </div>
        <div class="nav-bar ">
            <ul class="nav justify-content-end">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                    <div class="dropdown-menu">
                        <a class="nav-link text-navi-blue dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item nav-link text-navi-blue" href="/profile">View Profile</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
            </ul>
        </div>
    </div>
</header>