<aside class="sidebar">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="/" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="/dashboard">
                    <iconify-icon icon="mage:dashboard" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/dashboard/posts" class="{{ request() -> is('dashboard/posts*') ? 'bg-gray-900 text-white!' : '' }}">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>My Posts</span>
                </a>
            </li>
            @can('admin')
            <li class="sidebar-menu-group-title">Administrator</li>
            <li>
                <a href="/dashboard/categories" class="{{ request() -> is('dashboard/categories*') ? 'bg-gray-900 text-white!' : '' }}">
                    <iconify-icon icon="material-symbols:category-search-rounded" width="24" height="24"></iconify-icon>
                    <span>Categories</span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</aside>