<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if(\App\Models\Menu::exists())
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>{{ __('Menu') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @foreach(\App\Models\Menu::all() as $menu)
                @if($menu->name != \App\Models\Menu::MENU_DASHBOARD)
                <li>
                    <a href="{{ route('admin.'.Illuminate\Support\Str::lower($menu->name).'.index') }}">
                        <i class="bi bi-circle"></i><span>{{ $menu->name }}</span>
                    </a>
                </li>
                @endif
                @endforeach
            </ul>
        </li><!-- End Components Nav -->
        @endif

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.access-controls') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Access Controls') }}</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar-->