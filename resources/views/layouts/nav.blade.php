<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <router-link class="navbar-brand" to="/"  exact>{{ config('app.name', 'Laravel') }}</router-link>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Localization -->
                <li class="nav-item">
                    @php
                        $locale = (Config::get('app.locale') == 'en') ? 'bn' : 'en';
                    @endphp
                    <a class="nav-link" href="{{ url('locale/' . $locale) }}">{{ strtoupper($locale) }}</a>
                </li>

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item"><router-link class="nav-link" to="/todo" exact>Todo</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" to="/mission" exact>Mission</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" to="/attendance" exact>Attendance</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" to="/report" exact>Report</router-link></li>
                    <li class="nav-item"><router-link class="nav-link" to="/passport" exact>Passport</router-link></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
