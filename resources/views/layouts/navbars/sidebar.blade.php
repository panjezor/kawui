<div class="sidebar" data-color="green" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
            KaWUI </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#usersDropdown" aria-expanded="true">
                    <i class="material-icons ">accessibility</i>
                    <p>{{ __('Users') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="usersDropdown">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <i class="material-icons">settings_applications</i>
                                <span class="sidebar-normal">{{ __('User profile') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <i class="material-icons">person_search</i>
                                <span class="sidebar-normal"> {{ __('User Management') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item{{ $activePage == 'programs' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('programs') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Programs') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('notifications') }}">
                    <i class="material-icons">notifications</i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'to-do-list' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('todo.index') }}">
                    <p>{{ __('NEEDS DOING') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'to-do-list' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('todo.index') }}">
                    <i class="material-icons">today</i>
                    <p>{{ __('Tasks') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'to-do-list' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('todo.index') }}">
                    <i class="material-icons">how_to_reg</i>
                    <p>{{ __('Permissions') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'to-do-list' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('todo.index') }}">
                    <i class="material-icons">memory</i>
                    <p>{{ __('Programs') }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
