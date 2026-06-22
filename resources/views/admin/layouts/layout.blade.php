<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css">

    <!-- Custom Styles -->
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px;
            --navbar-height: 70px;
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #8b5cf6;
            --sidebar-bg: #1a1a2e;
            --sidebar-hover: rgba(255, 255, 255, 0.05);
            --active-item-gradient: linear-gradient(135deg, #6366f1, #8b5cf6);
            --accent-glow: 0 4px 20px rgba(99, 102, 241, 0.3);
            --text-muted: #9295b8;
            --card-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #f8f9fa;
            color: #495057;
            overflow-x: hidden;
        }

        /* Layout Structure */
        .layout-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .layout-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            color: #fff;
            z-index: 1000;
            transition: width var(--transition-speed) ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .layout-menu::-webkit-scrollbar {
            width: 4px;
        }

        .layout-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .layout-menu::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Sidebar Brand */
        .app-brand {
            display: flex;
            align-items: center;
            padding: 20px 24px;
            height: var(--navbar-height);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .app-brand-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #fff;
        }

        .app-brand-logo {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--active-item-gradient);
            border-radius: 10px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .app-brand-text {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            white-space: nowrap;
            transition: opacity var(--transition-speed) ease;
        }

        /* Menu Styles */
        .menu-inner {
            padding: 16px 14px !important;
            list-style: none;
        }

        .bg-menu-theme .menu-link {
            display: flex;
            align-items: center;
            color: var(--text-muted) !important;
            font-weight: 500;
            border-radius: 8px;
            margin: 4px 0;
            padding: 10px 14px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            position: relative;
        }

        .bg-menu-theme .menu-link:hover {
            background-color: var(--sidebar-hover) !important;
            color: #ffffff !important;
        }

        .bg-menu-theme .menu-item.active>.menu-link {
            background: var(--active-item-gradient) !important;
            color: #ffffff !important;
            box-shadow: var(--accent-glow) !important;
            font-weight: 600;
        }

        .bg-menu-theme .menu-item.active>.menu-link i {
            color: #ffffff !important;
        }

        .menu-item .menu-icon {
            font-size: 1.25rem;
            transition: transform 0.2s ease;
            color: #6c7293;
            width: 24px;
            text-align: center;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .menu-item:hover .menu-icon {
            transform: scale(1.08);
        }

        .menu-item.active .menu-icon {
            color: #fff;
        }

        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            transition: opacity var(--transition-speed) ease;
        }

        /* Submenu Styles */
        .bg-menu-theme .menu-sub {
            background: transparent !important;
            padding-left: 12px;
            margin: 4px 0 6px 8px;
            border-left: 1px dashed rgba(255, 255, 255, 0.12);
            list-style: none !important;
            display: none;
        }

        .bg-menu-theme .menu-item.open>.menu-sub {
            display: block;
        }

        .bg-menu-theme .menu-sub .menu-link {
            padding: 8px 14px;
            font-size: 0.88rem;
            padding-left: 36px;
        }

        .bg-menu-theme .menu-sub>.menu-item>.menu-link:before {
            content: "";
            position: absolute;
            left: -0.5625rem;
            width: 0.375rem;
            height: 0.375rem;
            border-radius: 50%;
            background: var(--text-muted);
            top: 50%;
            transform: translateY(-50%);
            transition: background 0.3s ease;
        }

        .bg-menu-theme .menu-sub>.menu-item.highlight>.menu-link:before {
            background: var(--primary-color);
        }

        .bg-menu-theme .menu-sub .menu-item.highlight .menu-link {
            color: #38bdf8 !important;
            background: rgba(56, 189, 248, 0.06);
        }

        /* Menu Toggle */
        .menu-toggle {
            position: relative;
        }

        .menu-toggle:after {
            content: '\f105';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            transition: transform 0.3s ease;
            color: var(--text-muted);
        }

        .menu-item.open>.menu-toggle:after {
            transform: translateY(-50%) rotate(90deg);
        }

        /* Collapsed Menu */
        .layout-menu-collapsed .layout-menu {
            width: var(--sidebar-collapsed-width);
        }

        .layout-menu-collapsed .app-brand-text,
        .layout-menu-collapsed .text-truncate {
            opacity: 0;
            display: none;
        }

        .layout-menu-collapsed .menu-item .menu-icon {
            margin-right: 0;
        }

        .layout-menu-collapsed .menu-item .menu-toggle:after {
            display: none;
        }

        .layout-menu-collapsed .menu-sub {
            display: none !important;
        }

        .layout-menu-collapsed .app-brand {
            padding: 20px 20px;
        }

        /* Main Content Area */
        .layout-page {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left var(--transition-speed) ease;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .layout-menu-collapsed .layout-page {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Navbar */
        .layout-navbar {
            position: sticky;
            top: 0;
            z-index: 999;
            background: #fff;
            height: var(--navbar-height);
            padding: 0 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-toggle {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: #495057;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background 0.2s ease;
        }

        .navbar-toggle:hover {
            background: #f1f3f5;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Content Wrapper */
        .content-wrapper {
            flex: 1;
            padding: 0;
        }

        /* Footer */
        .layout-footer {
            padding: 16px 24px;
            background: #fff;
            border-top: 1px solid #e9ecef;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        /* Dropdown */
        .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 8px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            border-radius: 6px;
            margin: 0 4px;
        }

        .dropdown-item:hover {
            background: #f1f3f5;
        }

        .dropdown-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Avatar */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--active-item-gradient);
            color: #fff;
            font-weight: 600;
            font-size: 16px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .layout-menu {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .layout-menu.show {
                transform: translateX(0);
            }

            .layout-page {
                margin-left: 0 !important;
            }

            .layout-menu-collapsed .layout-menu {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .layout-menu-collapsed .layout-menu.show {
                transform: translateX(0);
            }

            /* Mobile Overlay */
            .layout-menu-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .layout-menu-overlay.show {
                display: block;
            }
        }

        @media (max-width: 576px) {
            .layout-navbar {
                padding: 0 16px;
            }
        }

        /* Utility Classes */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .dropdown-toggle::after {
            display: inline-block;
            margin-left: .255em;
            vertical-align: .255em;
            content: none;
            border-top: .3em solid;
            border-right: .3em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Layout Wrapper -->
    <div class="layout-wrapper" id="app">

        <!-- Sidebar Overlay (Mobile) -->
        <div class="layout-menu-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="layout-menu bg-menu-theme" id="sidebar">
            <div class="app-brand">
                <a href="{{ url('/') }}" class="app-brand-link">
                    <span class="app-brand-logo">
                        <i class="bx bx-building"></i>
                    </span>
                    <span class="app-brand-text">Academy</span>
                </a>
            </div>

            <!-- Menu Items -->
            @include('admin.layouts.leftnav')
        </aside>

        <!-- Main Content -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar navbar navbar-expand-lg">
                <div class="navbar-left">
                    <button class="navbar-toggle" id="sidebarToggle">
                        <i class="bx bx-menu"></i>
                    </button>
                    <div class="d-none d-md-block">
                        <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
                    </div>
                </div>

                <div class="navbar-right">
                    <!-- User Profile -->
                    <div class="dropdown">
                        <button class="btn btn-link p-0 text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar">
                                    {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                                </div>
                                <div class="d-none d-lg-block text-start">
                                    <div class="small fw-semibold">{{ Auth::user()->name ?? 'User' }}</div>
                                    <div class="small text-muted" style="font-size: 11px;">
                                        {{ Auth::user()->email ?? '' }}</div>
                                </div>
                            </div>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="px-3 py-2 border-bottom">
                                <div class="small fw-semibold">{{ Auth::user()->name ?? 'User' }}</div>
                                <div class="small text-muted">{{ Auth::user()->email ?? '' }}</div>
                            </div>
                            {{-- <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="bx bx-user"></i> Profile
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="bx bx-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bx bx-log-out"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="layout-footer">
                &copy; {{ date('Y') }} Shahin Tech. All rights reserved.
                <span class="d-none d-sm-inline">| Version 1.0.0</span>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            function toggleSidebar() {
                if (window.innerWidth <= 992) {
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                } else {
                    body.classList.toggle('layout-menu-collapsed');
                }
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            overlay.addEventListener('click', toggleSidebar);

            // Menu Toggle (Submenu)
            document.querySelectorAll('.menu-toggle').forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = this.closest('.menu-item');
                    parent.classList.toggle('open');

                    // Close other open menus
                    document.querySelectorAll('.menu-item.open').forEach(item => {
                        if (item !== parent) {
                            item.classList.remove('open');
                        }
                    });
                });
            });

            // Handle resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 992) {
                    sidebar.classList.remove('show');
                    overlay.classList.remove('show');
                }
            });

            // Active menu highlight based on URL
            const currentUrl = window.location.pathname;
            document.querySelectorAll('.menu-link').forEach(link => {
                if (link.getAttribute('href') === currentUrl) {
                    const parent = link.closest('.menu-item');
                    if (parent) {
                        parent.classList.add('active');
                        // Open parent menu if it's a submenu
                        let parentSub = parent.closest('.menu-sub');
                        if (parentSub) {
                            let parentItem = parentSub.closest('.menu-item');
                            if (parentItem) {
                                parentItem.classList.add('open');
                                parentItem.classList.add('active');
                            }
                        }
                    }
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
