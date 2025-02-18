<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">    
        @if(auth()->user()->can('View Dashboard'))
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->getAllPermissions())
        <li class="nav-item">
            <a class="nav-link 
                {{ 
                    request()->is('admin/blogs') 
                    || request()->is('admin/clients')
                    || request()->is('admin/services') 
                    || request()->is('admin/sectors')  
                    || request()->is('admin/projects')
                    || request()->is('admin/products')  
                    || request()->is('admin/testimonials') 
                    ? '' : 'collapsed' 
                }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="{{ 
                    request()->is('admin/blogs') 
                    || request()->is('admin/clients')
                    || request()->is('admin/services') 
                    || request()->is('admin/sectors')  
                    || request()->is('admin/projects')
                    || request()->is('admin/products')  
                    || request()->is('admin/testimonials') 
                    ? 'true' : 'false'  
                }}">
                <i class="bi bi-menu-button-wide"></i><span>{{ __('Menu') }}</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{ 
                    request()->is('admin/blogs') 
                    || request()->is('admin/clients')
                    || request()->is('admin/services') 
                    || request()->is('admin/sectors')  
                    || request()->is('admin/projects')
                    || request()->is('admin/products')  
                    || request()->is('admin/testimonials') 
                    ? 'show' : '' 
                }}" data-bs-parent="#sidebar-nav">
                @if(auth()->user()->can('Blogs List'))
                <li>
                    <a href="{{ route('admin.blogs.index') }}" class="{{ request()->is('admin/blogs') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Blogs') }}</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('Services List'))
                <li>
                    <a href="{{ route('admin.services.index') }}" class="{{ request()->is('admin/services') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Services') }}</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Clients List'))
                <li>
                    <a href="{{ route('admin.clients.index') }}" class="{{ request()->is('admin/clients') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Clients') }}</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Sectors List'))
                <li>
                    <a href="{{ route('admin.sectors.index') }}" class="{{ request()->is('admin/sectors') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Sectors') }}</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Projects List'))
                <li>
                    <a href="{{ route('admin.projects.index') }}" class="{{ request()->is('admin/projects') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Projects') }}</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('Products List'))
                <li>
                    <a href="{{ route('admin.products.index') }}" class="{{ request()->is('admin/products') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Products') }}</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('Testimonials List'))
                <li>
                    <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->is('admin/testimonials') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>{{ __('Testimonials') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </li><!-- End Components Nav -->
        @endif
        
        @role('Super Admin')
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.access-controls') }}">
                <i class="bi bi-grid"></i>
                <span>{{ __('Access Controls') }}</span>
            </a>
        </li>
        @endrole

    </ul>

</aside><!-- End Sidebar-->