<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(auth()->user()->can('View Dashboard'))
        <li class="nav-item">
            <a class="nav-link" style="background: #f6f9ff;" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        @endif

        <!-- @if(auth()->user()->can('Projects List'))
        <li class="nav-item">
            <a href="{{ route('admin.projects.index') }}" class="nav-link">
                <i class="bi bi-circle"></i><span>{{ __('Projects') }}</span>
            </a>
        </li>
        @endif -->
        @if(auth()->user()->can('Products List'))
        <li class="nav-item">
            <a href="{{ route('admin.products.index') }}" class="nav-link">
                <i class="bi bi-list-task"></i><span>{{ __('Products') }}</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->can('Services List'))
        <li class="nav-item">
            <a href="{{ route('admin.services.index') }}" class="nav-link">
                <i class="bi bi-list-task"></i><span>{{ __('Services') }}</span>
            </a>
        </li>
        @endif
        
        @if(auth()->user()->can('Sectors List'))
        <li class="nav-item">
            <a href="{{ route('admin.sectors.index') }}" class="nav-link">
                <i class="bi bi-building"></i><span>{{ __('Sectors') }}</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->can('Careers List'))
        <li class="nav-item">
            <a href="{{ route('admin.careers.index') }}" class="nav-link">
                <i class="bi bi-list-task"></i><span>{{ __('Careers') }}</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->can('Clients List'))
        <li class="nav-item">
            <a href="{{ route('admin.clients.index') }}" class="nav-link">
                <i class="bi bi-person-fill"></i><span>{{ __('Clients') }}</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->can('Blogs List'))
        <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                <i class="bi bi-list-task"></i><span>{{ __('Blogs') }}</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->can('Testimonials List'))
        <li class="nav-item">
            <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                <i class="bi bi-people-fill"></i><span>{{ __('Testimonials') }}</span>
            </a>
        </li>
        @endif

        @if(auth()->user()->can('Faqs List'))
        <li class="nav-item">
            <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                <i class="bi bi-list-task"></i><span>{{ __('Faqs') }}</span>
            </a>
        </li>
        @endif

        @role('Super Admin')
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.access-controls') }}">
                <i class="bi bi-gear-wide-connected"></i>
                <span>{{ __('Access Controls') }}</span>
            </a>
        </li>
        @endrole

    </ul>

</aside><!-- End Sidebar-->