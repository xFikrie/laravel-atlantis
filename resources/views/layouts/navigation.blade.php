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
                @php
                    $module = App\Models\Module::orderBy('urutan')->get();
                @endphp

                @foreach ($module as $item)
                    @canany([Str::lower($item->module) . '_read', 'admin_access'])
                        @if (Str::contains($item->url, '#'))
                            <li class="nav-item {{ request()->segment(1) == Str::lower($item->module) ? 'active' : '' }}">
                                <a data-toggle="collapse" href="{{ $item->url }}">
                                    <i class="{{ $item->icon }}"></i>
                                    <p>{{ Str::after($item->url, '#') }}</p>
                                    <span class="caret"></span>
                                </a>
                                @php
                                    $sub_module = App\Models\Module::where('parent', $item->id)->get();
                                @endphp

                                @foreach ($sub_module as $item_sub)
                                    <div class="collapse {{ request()->segment(2) == Str::lower($item_sub->module) ? 'show' : '' }}"
                                        id="{{ Str::after($item->url, '#') }}">
                                        <ul class="nav nav-collapse">
                                            <li class="{{ request()->segment(2) == Str::lower($item_sub->module) ? 'active' : '' }}">
                                                <a href="{{ route($item_sub->url) }}">
                                                    <span class="sub-item">{{ $item_sub->module }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </li>
                        @else
                            @if (!$item->parent)
                                <li class="nav-item {{ request()->routeIs(Str::lower($item->url)) ? 'active' : '' }}">
                                    <a href="{{ route(Str::lower($item->url)) }}">
                                        <i class="{{ $item->icon }}"></i>
                                        <p>{{ $item->module }}</p>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endcanany
                @endforeach

                @can('admin_access')
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
                @endcan
            </ul>
        </div>
    </div>
</div>
