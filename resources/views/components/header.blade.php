<header class="app-header border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="flex items-center space-x-3">
            {{-- <div class="xl:hidden">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2 fs-6"></i>
                </a>
            </div> --}}
            <a href="{{ route('landing') }}" class="btn text-blue-500">
                <i class="fas fa-square-virus mx-1"></i>
                Analisa penyakit
            </a>
        </div>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/profile_picture.png') }}" alt="" width="35"
                            height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                {{ auth()->user()->username }}
                            </a>
                            <a href="{{ route('landing') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-home fs-6"></i>
                                Home
                            </a>
                            <label for="logout-button" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</label>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="d-none" id="logout-button"></button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
