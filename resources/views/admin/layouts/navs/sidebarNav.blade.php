<ul class="sidebar-nav">
    <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Billing</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.billing.expenses.index') }}">Expenses</a></li>
            <li><a href="{{ route('admin.billing.transactions.index') }}">Transactions</a></li>
            <li class="dropdown dropdown-submenu">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Invoices</a>
                <ul class="dropdown-menu submenu-dropdown-menu">
                    <li><a href="">All Invoices</a></li>
                    <li><a href="">Create Invoice</a></li>
                    <hr>
                    <li><a href="">Paid</a></li>
                    <li><a href="">Unpaid</a></li>
                    <li><a href="">Draft</a></li>
                    <li><a href="">Cancelled</a></li>
                    <li><a href="">Refunded</a></li>
                    <li><a href="">Cancellations</a></li>
                    <li><a href="">Payment Pending</a></li>
                </ul>
            </li>
            <li class="dropdown dropdown-submenu">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Billable Items</a>
                <ul class="dropdown-menu"></ul>
            </li>
            <li><a href="">Quotes</a></li>
            <li><a href="">Estimates</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.clients.index') }}">All Clients</a></li>
            <li><a href="{{ route('admin.clients.create') }}">Create Client</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Contracts</a>
        <ul class="dropdown-menu">
            <li><a href="">All Contracts</a></li>
            <li><a href="">Create Contract</a></li>
            <hr>
            <li><a href="">All Contract Types</a></li>
            <li><a href="">Create Contract Type</a></li>
            <hr>
            <li><a href="">Contract Styles</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Leads</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.leads.index') }}">All Leads</a>
            </li>
            <li>
                <a href="{{ route('admin.leads.create') }}">
                    Create Lead
                </a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Marketing</a>
        <ul class="dropdown-menu">

        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Orders</a>
        <ul class="dropdown-menu">

        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Project Management</a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Proposals</a>
        <ul class="dropdown-menu">
            <li><a href="">All Proposals</a></li>
            <li><a href="">Create Proposal</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Reports</a>
        <ul class="dropdown-menu"></ul>
    </li>

    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Staff</a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('admin.staff.index') }}">All Staff</a>
            </li>
            <li>
                <a href="{{ route('admin.staff.create') }}">Add Staff Member</a>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Support</a>
        <ul class="dropdown-menu">

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
                <a href="{{ route('admin.billing.expenses.categories.index') }}">Expense Categories</a>
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
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Tools</a>
        <ul class="dropdown-menu">

        </ul>
    </li>
</ul>
