<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    {{-- BRAND AREA --}}
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" 
                 alt="AdminLTE Logo" 
                 class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">RSHP</span>
        </a>
    </div>

    {{-- SIDEBAR CONTENT --}}
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" 
                data-lte-toggle="treeview" 
                role="menu"
                data-accordion="false">

                @php
                    $roleId = session('user_role');
                @endphp

                {{-- ======================== ADMIN ======================== --}}
                @if($roleId == 1)

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Master Data --}}
                <li class="nav-item {{ request()->is('admin/jenis-hewan*') || request()->is('admin/Ras-hewan*') || request()->is('admin/kategori*') || request()->is('admin/kategori-klinis*') || request()->is('admin/kode-tindakan-terapi*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.jenis-hewan.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.jenis-hewan.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Jenis Hewan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.ras-hewan.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.ras-hewan.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ras Hewan</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kategori.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kategori-klinis.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.kategori-klinis.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kategori Klinis</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.kode-tindakan-terapi.index') }}" 
                               class="nav-link {{ request()->routeIs('admin.kode-tindakan-terapi.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Kode Tindakan Terapi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- PET --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pet.index') }}"
                       class="nav-link {{ request()->routeIs('admin.pet.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-heart-fill"></i>
                        <p>Data Pet</p>
                    </a>
                </li>

                {{-- PEMILIK --}}
                <li class="nav-item">
                    <a href="{{ route('admin.pemilik.index') }}"
                       class="nav-link {{ request()->routeIs('admin.pemilik.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Data Pemilik</p>
                    </a>
                </li>

                {{-- USER Management --}}
                <li class="nav-item {{ request()->is('admin/role*') || request()->is('admin/role-user*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock-fill"></i>
                        <p>User Management <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}"
                               class="nav-link {{ request()->routeIs('admin.role.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Role</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.role-user.index') }}"
                               class="nav-link {{ request()->routeIs('admin.role-user.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>User</p>
                            </a>
                        </li>

                    </ul>
                </li>

                @endif

                {{-- ================== LOGOUT ================== --}}
                <li class="nav-header">AKUN</li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

</aside>
