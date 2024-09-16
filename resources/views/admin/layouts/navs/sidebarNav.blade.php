<ul class="sidebar-nav">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
        <ul class="dropdown-menu">
            <li><a href="{{--{{ route('admin.clients.index') }}--}}">All Clients</a></li>
            <li><a href="{{--{{ route('admin.clients.create') }}--}}">Create Client</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Staff</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{--{{ route('admin.staff.index') }}--}}">All Staff</a>
            </li>
            <li>
                <a href="{{--{{ route('admin.staff.create') }}--}}">Add Staff Member</a>
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
                <a href="{{--{{ route('admin.settings.payment-methods.index') }}--}}">
                    Payment Methods
                </a>
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
