<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
    
        <div class="col-4">
        <a class="blog-header-logo text-dark" href="/">Новостной портал</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
        <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <div class="auth-drop-down">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
    </div>
</header>