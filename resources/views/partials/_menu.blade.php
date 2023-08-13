<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li class="has-child {{ Request::is(app()->getLocale().'/dashboards/*') ? 'open':'' }}">
            <a href="/" class="{{ Request::is(app()->getLocale().'/dashboards/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-create-dashboard"></span>
                <span class="menu-text">Find Hotels</span>
                {{-- <span class="toggle-icon"></span> --}}
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('changelog',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/changelog') ? 'active':'' }}">
                <span class="nav-icon uil uil-arrow-growth"></span>
                <span class="menu-text">{{ trans('menu.changelog-menu-title') }}</span>
                <span class="badge badge-info-10 menuItem rounded-pill">1.0.1</span>
            </a>
        </li> --}}
        <li class="menu-title mt-30">
            <span>Bookings And Reservations</span>
        </li>
        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calendar-alt"></span>
                <span class="menu-text">My Bookings</span>
            </a>
        </li>
       
        <li class="menu-title mt-30">
            <span>Manage Rooms and Halls</span>
        </li>
       
        <li>
            <a href="{{ route('pages.faq',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/pages/faq') ? 'active':'' }}">
                <span class="nav-icon uil uil-question-circle"></span>
                <span class="menu-text">Overview</span>
            </a>
        </li>

        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calendar-alt"></span>
                <span class="menu-text">Calendar View</span>
            </a>
        </li>

        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calendar-alt"></span>
                <span class="menu-text">View Rooms</span>
            </a>
        </li>

        <li>
            <a href="{{ route('calendar',app()->getLocale()) }}" class="{{ Request::is(app()->getLocale().'/applications/calendar') ? 'active':'' }}">
                <span class="nav-icon uil uil-calendar-alt"></span>
                <span class="menu-text">Expiring Reservations</span>
            </a>
        </li>
    </ul>
</div>
