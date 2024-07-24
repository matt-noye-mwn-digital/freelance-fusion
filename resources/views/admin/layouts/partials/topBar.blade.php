<header>
    <div class="topbar">
        <div class="container-fluid div row align-items-center">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <form action="" method="post" class="searchFormMain">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="" id="" class="form-control">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-xl-3 d-lg-flex justify-content-lg-end">
                <ul class="list-inline topbarEndList">
                    <li class="list-inline-item">
                        <button class="sidebarMenuToggler">
                            <i class="fas fa-times"></i>
                        </button>
                    </li>
                    <li class="list-inline-item notifications">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                        </a>
                    </li>
                    <li class="list-inline-item dropdown userDropdown">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(Auth::user()->avatar)
                                <img class="img-fluid userAvatar" src="{{ asset(Auth::user()->avatar) }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} avatar"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            @else
                                <img class="img-fluid userAvatar" src="{{ asset('images/male-avatar.jpg') }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} avatar"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="">My Account</a>
                            </li>
                            <hr>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
