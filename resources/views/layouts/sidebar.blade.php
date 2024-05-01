<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        @if (auth()->user()->role == 'member')
            <div class="sidebar-brand">
                <a href="index.html">MEMBER</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">ME</a>
            </div>
        @else
            <div class="sidebar-brand">
                <a href="index.html">ADMIN</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">AD</a>
            </div>
        @endif
        <ul class="sidebar-menu">

            @if (auth()->user()->role == 'member')
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                            class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a></li>
                <li class="menu-header">Data Kos</li>
                <li class="{{ Request::is('datakos*') ? 'active' : '' }}"><a class="nav-link" href="/datakos"><i
                            class="fas fa-warehouse"></i>
                        <span>Data Kos</span></a></li>
                <li class="{{ Request::is('gambarkos*') ? 'active' : '' }}"><a class="nav-link" href="/gambarkos"><i
                            class="fas fa-image"></i>
                        <span>Gambar Kos</span></a></li>
                <li class="{{ Request::is('fasilitaskos*') ? 'active' : '' }}"><a class="nav-link"
                        href="/fasilitaskos"><i class="fas fa-list"></i>
                        <span>Fasilitas Kos</span></a></li>
                <li class="menu-header">Profil</li>
                <li class="{{ Request::is('profil*') ? 'active' : '' }}"><a class="nav-link" href="/profil"><i
                            class="fas fa-user"></i>
                        <span>Profil</span></a></li>
            @endif

            @if (auth()->user()->role == 'admin')
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('dashboardAdmin*') ? 'active' : '' }}"><a class="nav-link"
                        href="/dashboardAdmin"><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a></li>
                <li class="menu-header">Data</li>
                <li class="{{ Request::is('verifikasi*') ? 'active' : '' }}"><a class="nav-link" href="/verifikasi"><i
                            class="fas fa-user-check"></i>
                        <span>User verifikasi</span></a></li>
                <li class="{{ Request::is('datamember*') ? 'active' : '' }}"><a class="nav-link" href="/datamember"><i
                            class="fas fa-users"></i>
                        <span>Data Member</span></a></li>
                {{-- Fitur dinonaktifkan --}}
                {{-- <li class="{{ Request::is('dataadmin*') ? 'active' : '' }}"><a class="nav-link" href="/dataadmin"><i
                            class="fas fa-user"></i>
                        <span>Data Admin</span></a></li> --}}
                <li class="{{ Request::is('datakost*') ? 'active' : '' }}"><a class="nav-link" href="/datakost"><i
                            class="fas fa-list"></i>
                        <span>Data Kosan</span></a></li>
                <li class="menu-header">Profil</li>
                <li class="{{ Request::is('profileAdmin*') ? 'active' : '' }}"><a class="nav-link" href="/profileAdmin"><i
                            class="fas fa-user"></i>
                        <span>Profil</span></a></li>
            @endif
        </ul>
    </aside>
</div>
