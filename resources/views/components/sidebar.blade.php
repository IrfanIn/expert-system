<aside class="dark:bg-gray-800  left-sidebar ">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center shadow shadow-sm">
            <div class="d-flex align-items-center gap-2" style="padding: 0 10px">
                {{-- <img src="{{ asset('images/logo-ehospital.png') }}" alt="" width="25"> --}}
                <a href="{{ route('landing') }}" class="fs-5">
                    <small>Expert System</small>
                </a>
            </div>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar">
            <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">main</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('analisa') }}">
                        <span>
                            <i class="fas fa-chart-simple"></i>
                        </span>
                        <span class="hide-menu">Analisa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <span>
                            <i class="fas fa-virus"></i>
                        </span>
                        <span class="hide-menu">Penyakit</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="sidebar-link bg-danger text-white" href="">
                            <span>
                                <i class="fas fa-right-to-bracket"></i>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </a>

                    </form>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
