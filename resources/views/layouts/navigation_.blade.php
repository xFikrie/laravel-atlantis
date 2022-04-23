<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="profile" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="{{ route('dashboard') }}" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('berita') ? 'active' : '' }}">
                    <a href="{{ route('berita') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('gtkpaudtv') ? 'active' : '' }}">
                    <a href="{{ route('gtkpaudtv') }}">
                        <i class="fas fa-desktop"></i>
                        <p>GTKPAUD TV</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('majalah-buletin') ? 'active' : '' }}">
                    <a href="{{ route('majalah-buletin') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Majalah & Buletin</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('pencegahan-stunting') ? 'active' : '' }}">
                    <a href="{{ route('pencegahan-stunting') }}">
                        <i class="fas fa-child"></i>
                        <p>Pencegahan Stunting</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'master' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#master">
                        <i class="fas fa-bars"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->segment(2) == 'kategori' ? 'show' : '' }}" id="master">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->segment(2) == 'kategori' ? 'active' : '' }}">
                                <a href="{{ route('master.kategori') }}">
                                    <span class="sub-item">Kategori</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'user-management' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#user-management">
                        <i class="fas fa-users"></i>
                        <p>User Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->segment(1) == 'user-management' ? 'show' : '' }}"
                        id="user-management">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->segment(2) == 'user' ? 'active' : '' }}">
                                <a href="{{ route('user-management.user') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            <li class="{{ request()->segment(2) == 'role' ? 'active' : '' }}">
                                <a href="{{ route('user-management.role') }}">
                                    <span class="sub-item">Role</span>
                                </a>
                            </li>
                            <li class="{{ request()->segment(2) == 'permission' ? 'active' : '' }}">
                                <a href="{{ route('user-management.permission') }}">
                                    <span class="sub-item">Permission</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'setting' ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#setting">
                        <i class="fas fa-cog"></i>
                        <p>Setting</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->segment(1) == 'setting' ? 'show' : '' }}" id="setting">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->segment(2) == 'module' ? 'active' : '' }}">
                                <a href="{{ route('setting.module') }}">
                                    <span class="sub-item">Module</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
