<aside class="sidebar open">
    <div class="container">
        <div class="row">
            <div class="col-12 px-0">
                <a href="" class="brand">
                    Larabase
                </a>
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Staff</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">All Staff</a>
                            </li>
                            <li>
                                <a href="">Add Staff Member</a>
                            </li>
                        </ul>
                    </li>
                    <hr>
                    <li>
                        <a href="{{ route('admin.activity-log.index') }}">Activity Log</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Settings
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="">General Settings</a>
                            </li>
                            <li>
                                <a href="">Branding</a>
                            </li>
                            <li>
                                <a href="">Email Settings</a>
                            </li>
                            <li>
                                <a href="">Roles</a>
                            </li>
                            <li>
                                <a href="">Permissions</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
