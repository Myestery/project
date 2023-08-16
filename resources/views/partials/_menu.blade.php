<div class="sidebar__menu-group">
    <ul class="sidebar_nav">
        <li class=" {{ Request::is('/') ? 'open':'' }}">
            <a href="/" class="{{ Request::is(app()->getLocale().'/dashboards/*') ? 'active':'' }}">
                <span class="nav-icon uil uil-search"></span>
                <span class="menu-text">Find Hotels</span>
            </a>
        </li>
        <li class="menu-title mt-30">
            <span>Bookings And Reservations</span>
        </li>
        <li>
            <a href="{{ route('bookings') }}" class="{{ Request::is('/bookings') ? 'active':'' }}">
                <span class="nav-icon uil uil-bookmark"></span>
                <span class="menu-text">My Bookings</span>
            </a>
        </li>
       
        <li class="menu-title mt-30">
            <span>Manage Rooms and Halls</span>
        </li>
       
        <li>
            <a href="{{ route('dashboard') }}" class="{{ Request::is('/dashboard') ? 'active':'' }}">
                <span class="nav-icon uil uil-apps"></span>
                <span class="menu-text">Overview</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.rooms') }}" class="{{ Request::is('/admin/rooms') ? 'active':'' }}">
                <span class="nav-icon fa fa-list"></span>
                <span class="menu-text">View Rooms</span>
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
                <span class="menu-text">Expiring Reservations</span>
            </a>
        </li>
    </ul>
</div>
