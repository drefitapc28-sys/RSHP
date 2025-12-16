<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

    {{-- BRAND AREA --}}
    <div class="sidebar-brand">
        <a href="#" class="brand-link">
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}"
                 alt="Logo"
                 class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">RSHP</span>
        </a>
    </div>

    {{-- SIDEBAR CONTENT --}}
    <div class="sidebar-wrapper">
        <nav class="mt-2">

            @php
                $roleId = session('user_role');
            @endphp

            <ul class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="menu"
                data-accordion="false">

                {{-- ========================== ADMIN ======================== --}}

                @if($roleId == 1)

                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- MASTER DATA --}}
                    <li class="nav-item {{ request()->is('admin/jenis-hewan*') || request()->is('admin/ras-hewan*') || request()->is('admin/kategori*') || request()->is('admin/kategori-klinis*') || request()->is('admin/kode-tindakan-terapi*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-boxes"></i>
                            <p>Master Data <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('admin.jenis-hewan.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.jenis-hewan.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i><p>Jenis Hewan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.ras-hewan.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.ras-hewan.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i><p>Ras Hewan</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.kategori.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i><p>Kategori</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.kategori-klinis.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.kategori-klinis.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i><p>Kategori Klinis</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.kode-tindakan-terapi.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.kode-tindakan-terapi.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i><p>Kode Tindakan Terapi</p>
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

                    {{-- USER MANAGEMENT --}}
                    <li class="nav-item {{ request()->is('admin/role*') || request()->is('admin/role_user*') ? 'menu-open' : '' }}">
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
                            <a href="{{ route('admin.user.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>User</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ route('admin.role_user.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.role_user.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Role User</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    {{-- TRANSAKSI --}}
                    <li class="nav-item {{ request()->is('admin/dokter*') || request()->is('admin/perawat*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-journal-text"></i>
                            <p>Transaksi <i class="nav-arrow bi bi-chevron-right"></i></p>
                        </a>

                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('admin.dokter.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.dokter.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Kelengkapan Data Dokter</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.perawat.index') }}"
                                   class="nav-link {{ request()->routeIs('admin.perawat.*') ? 'active' : '' }}">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Kelengkapan Data Perawat</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                @endif

                {{-- ========================== DOKTER ======================= --}}
          
                @if($roleId == 2)

                    {{-- Dashboard Dokter --}}
                    <li class="nav-item">
                        <a href="{{ route('dokter.dashboard') }}"
                        class="nav-link {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Rekam Medis --}}
                    <li class="nav-item">
                        <a href="{{ route('dokter.rekam.index') }}"
                        class="nav-link {{ request()->routeIs('dokter.rekam.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-medical"></i>
                            <p>Rekam Medis</p>
                        </a>
                    </li>

                    {{-- Data Pemilik --}}
                    <li class="nav-item">
                        <a href="{{ route('dokter.pemilik.index') }}"
                        class="nav-link {{ request()->routeIs('dokter.pemilik.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>Data Pemilik</p>
                        </a>
                    </li>

                    {{-- Data Hewan --}}
                    <li class="nav-item">
                        <a href="{{ route('dokter.pet.index') }}"
                        class="nav-link {{ request()->routeIs('dokter.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-heart"></i>
                            <p>Data Hewan</p>
                        </a>
                    </li>

                    {{-- Profil Saya --}}
                    <li class="nav-item">
                        <a href="{{ route('dokter.profil') }}"
                        class="nav-link {{ request()->routeIs('dokter.profil') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i>
                            <p>Data Saya</p>
                        </a>
                    </li>

                @endif


                {{-- ======================== PERAWAT ======================== --}}
        
                @if($roleId == 3)

                    {{-- Dashboard Perawat --}}
                    <li class="nav-item">
                        <a href="{{ route('perawat.dashboard') }}"
                        class="nav-link {{ request()->routeIs('perawat.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.rekam-medis.index') }}"
                        class="nav-link {{ request()->routeIs('perawat.rekam-medis.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-journal-bookmark"></i>
                            <p>Kelola Rekam Medis</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.pet.index') }}"
                        class="nav-link {{ request()->routeIs('perawat.pet.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-heart"></i>
                            <p>Data Hewan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.pemilik.index') }}"
                        class="nav-link {{ request()->routeIs('perawat.pemilik.*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Data Pemilik</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('perawat.profil') }}"
                        class="nav-link {{ request()->routeIs('perawat.profil') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-person-circle"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>

                @endif


                
                {{-- ====================== RESEPSIONIS ====================== --}}

                @if($roleId == 4)
                    <li class="nav-header">RESEPSIONIS</li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.dashboard') }}" 
                        class="nav-link {{ request()->routeIs('resepsionis.dashboard') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.temu-dokter.index') }}" 
                        class="nav-link {{ request()->routeIs('resepsionis.temu-dokter.index') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-calendar-check"></i>
                            Temu Dokter
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pemilik.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-person"></i>
                            Data Pemilik
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('resepsionis.pet.index') }}" class="nav-link">
                            <i class="nav-icon bi bi-heart"></i>
                            Data Hewan
                        </a>
                    </li>
                @endif

                {{-- ======================== PEMILIK ======================== --}}

                @if($roleId == 5)
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('pemilik.dashboard') }}"
                    class="nav-link {{ request()->routeIs('pemilik.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Daftar Pet --}}
                <li class="nav-item">
                    <a href="{{ route('pemilik.pet.index') }}"
                    class="nav-link {{ request()->routeIs('pemilik.pet.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paw"></i>
                        <p>Daftar Hewan</p>
                    </a>
                </li>

                {{-- Daftar Reservasi --}}
                <li class="nav-item">
                    <a href="{{ route('pemilik.reservasi.index') }}"
                    class="nav-link {{ request()->routeIs('pemilik.reservasi.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>Daftar Reservasi</p>
                    </a>
                </li>

                {{-- Daftar Rekam Medis --}}
                <li class="nav-item">
                    <a href="{{ route('pemilik.rekam.index') }}"
                    class="nav-link {{ request()->routeIs('pemilik.rekam.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>Rekam Medis</p>
                    </a>
                </li>

                {{-- Profil --}}
                <li class="nav-item">
                    <a href="{{ route('pemilik.profil') }}"
                    class="nav-link {{ request()->routeIs('pemilik.profil') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>

            @endif

                {{-- ========================== LOGOUT ======================= --}}
     
                <li class="nav-header">Akun</li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-danger"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
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
