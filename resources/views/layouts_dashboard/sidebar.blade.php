 @php
    $laporancount = App\Laporan::where('kategori_id',Auth::user()->kategori_id)->where('status_laporan','0')->count()
@endphp
 <!-- MENU SIDEBAR -->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('img/logo-white.png') }}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset('images/'.Auth::user()->image) }}" alt="" />
                    </div>
                    <h4 class="name">{{ Auth::user()->username }}</h4>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="@if ($aktif == "dashboard") active @endif {{-- has-sub --}}">
                            <a class="js-arrow" href="/{{ Auth::user()->role }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                {{-- <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span> --}}
                            </a>
                            {{-- <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li>
                            </ul> --}}
                        </li>

                        @if (Auth::check() && Auth::user()->role == "superadmin")
                            <li class="@if ($aktif == "admin") active @endif">
                                <a href="{{ route('superadmin.daftar-admin') }}">
                                    <i class="fas fa-user-cog"></i>Daftar Admin
                                </a>
                            </li>
                            <li class="@if ($aktif == "petugas") active @endif">
                                <a href="{{ url('superadmin/daftar-petugas') }}">
                                    <i class="fas fa-user-tie"></i>Daftar Petugas
                                </a>
                            </li>
                            <li class="@if ($aktif == "user") active @endif">
                                <a href="{{ route('superadmin.daftar-user') }}">
                                    <i class="fas fa-users"></i>Daftar User
                                </a>
                            </li>
                            <li class="@if ($aktif == "kategori") active @endif">
                                <a href="{{ route('superadmin.daftar-kategori') }}">
                                    <i class="fas fa-clipboard-list"></i>Daftar Kategori
                                </a>
                            </li>
                            
                        @elseif (Auth::check() && Auth::user()->role == "admin")
                            <li class="@if ($aktif == "pengaduan") active @endif">
                                <a href="{{ route('admin.pengaduan') }}">
                                    <i class="fas fa-chart-bar"></i>Daftar Pengaduan
                                </a>
                                <span class="inbox-num"><?= $laporancount ?></span>
                            </li>
                            <li class="@if ($aktif == "petugas") active @endif">
                                <a href="{{ url('admin/daftar-petugas') }}">
                                    <i class="fas fa-user-tie"></i>Daftar Petugas
                                </a>
                            </li>

                        @elseif (Auth::check() && Auth::user()->role == "petugas")
                            <li class="@if ($aktif == "pengaduan") active @endif">
                                <a href="{{ route('petugas.pengaduan') }}">
                                    <i class="fas fa-chart-bar"></i>Laporan Pengaduan</a>
                                <span class="inbox-num">0</span>
                            </li>
                        @endif
                        {{-- <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Features
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Forms</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">
                                        <i class="fab fa-flickr"></i>Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">
                                        <i class="fas fa-comment-alt"></i>Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">
                                        <i class="far fa-window-maximize"></i>Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">
                                        <i class="far fa-id-card"></i>Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">
                                        <i class="far fa-bell"></i>Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">
                                        <i class="fas fa-tasks"></i>Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">
                                        <i class="far fa-window-restore"></i>Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">
                                        <i class="fas fa-toggle-on"></i>Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <i class="fas fa-th-large"></i>Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">
                                        <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">
                                        <i class="fas fa-font"></i>Typography</a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR