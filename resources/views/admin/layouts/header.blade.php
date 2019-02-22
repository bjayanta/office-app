<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Dashboard</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('profile.index') }}">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.attendance') }}">Attendance</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('mission.index') }}">Mission</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.report') }}">Report</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('account.index') }}">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('role.index') }}">Roles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('permission.index') }}">Permission</a></li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
