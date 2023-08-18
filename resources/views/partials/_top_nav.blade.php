<nav class="navbar navbar-light">
    <div class="navbar-left">
        <div class="logo-area">
            {{-- <a class="navbar-brand" href="{{ route('dashboard.demo_one',app()->getLocale()) }}"> --}}
            <img class="dark h-8" src="{{ asset('assets/img/logo.png') }}" alt="svg">
            </a>
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a>
        </div>
    </div>
    <div class="navbar-right">
        <ul class="navbar-right__menu">
            <li class="nav-search">
                <a href="#" class="search-toggle">
                    <i class="uil uil-search"></i>
                    <i class="uil uil-times"></i>
                </a>
                <form action="/search" class="search-form-topMenu">
                    <span class="search-icon uil uil-search"></span>
                    <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                        aria-label="Search" name="search">
                </form>
            </li>

            <li class="nav-author">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('assets/img/author-nav.jpg') }}"
                            alt="" class="rounded-circle">
                        @if (Auth::check())
                            <span class="nav-item__title">{{ Auth::user()->name }}<i
                                    class="las la-angle-down nav-item__arrow"></i></span>
                        @endif
                    </a>
                    <div class="dropdown-wrapper">
                        <div class="nav-author__info">
                            <div class="author-img">
                                <img src="{{ asset('assets/img/author-nav.jpg') }}" alt=""
                                    class="rounded-circle">
                            </div>
                            <div>
                                @if (Auth::check())
                                    <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                                @endif
                                {{-- <span>UI Designer</span> --}}
                            </div>
                        </div>
                        <div class="nav-author__options">

                            <a href="" class="nav-author__signout"
                                onclick="event.preventDefault();document.getElementById('logout').submit();">
                                <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
                                Sign Out</a>
                            <form style="display:none;" id="logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('post')
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="navbar-right__mobileAction d-md-none">
            <a href="#" class="btn-search">
                <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg feather-search">
                <img src="{{ asset('assets/img/svg/x.svg') }}" alt="x" class="svg feather-x">
            </a>
            <a href="#" class="btn-author-action">
                <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
        </div>
    </div>
</nav>
