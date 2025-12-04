<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HRIS AK') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        :root {
            --sidebar-width: 280px;
            --header-height: 4rem;
        }

        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            overflow-x: hidden;
        }

        /* App container */
        .app-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar-container {
            position: fixed;
            left: -280px;
            top: 0;
            bottom: 0;
            width: 280px;
            background: white;
            z-index: 40;
            border-right: 1px solid #e5e7eb;
            transition: left 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            overflow-y: auto;
        }

        .sidebar-open .sidebar-container {
            left: 0;
        }

        /* Main content */
        .main-content {
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header wrapper */
        .header-wrapper {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            height: var(--header-height);
            background: white;
            border-bottom: 1px solid #e5e7eb;
            z-index: 30;
            transition: left 0.3s ease;
        }

        .header-content {
            height: 100%;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Page content */
        .page-content {
            flex: 1;
            margin-top: var(--header-height);
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        /* Mobile overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 35;
        }

        .sidebar-open .sidebar-overlay {
            display: block;
        }

        /* Responsive behavior */
        @media (min-width: 1024px) {
            .sidebar-container {
                left: 0 !important;
                position: fixed;
            }
            
            .header-wrapper {
                left: var(--sidebar-width);
            }
            
            .page-content {
                margin-left: var(--sidebar-width);
                padding: 2rem;
            }
            
            .sidebar-overlay {
                display: none !important;
            }
            
            .header-content {
                padding: 0 2rem;
            }
            
            body.sidebar-collapsed .sidebar-container {
                left: -280px !important;
            }
            
            body.sidebar-collapsed .header-wrapper {
                left: 0 !important;
            }
            
            body.sidebar-collapsed .page-content {
                margin-left: 0 !important;
            }
        }

        @media (min-width: 768px) {
            .page-content {
                padding: 1.5rem;
            }
            
            .header-content {
                padding: 0 1.5rem;
            }
        }

        @media (min-width: 1280px) {
            .page-content {
                padding: 2rem;
            }
            
            .header-content {
                padding: 0 2rem;
            }
        }

        @media (max-width: 1023px) {
            .sidebar-container {
                left: -280px;
            }
            
            .page-content {
                margin-left: 0;
            }
            
            .sidebar-open .sidebar-container {
                left: 0;
            }
        }

        /* Dashboard specific styles */
        .stat-card {
            background: white;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            padding: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .gradient-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.75rem;
            color: white;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay lg:hidden" onclick="closeSidebar()"></div>
    
    <!-- Sidebar -->
    <div class="sidebar-container">
        @include('layouts.sidebar')
    </div>

    <div class="main-content">
        <!-- Fixed Header -->
        <div class="header-wrapper">
            <div class="header-content">
                <!-- Left section -->
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" 
                            class="p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 
                                   transition-colors mr-3 lg:hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <!-- Desktop sidebar toggle -->
                    <button onclick="toggleSidebar()" 
                            class="hidden lg:flex p-2 rounded-lg text-gray-600 hover:text-gray-900 
                                   hover:bg-gray-100 transition-colors mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburgerLines">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    
                    <!-- Page Title -->
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">
                            @if(View::hasSection('title'))
                                @yield('title')
                            @else
                                {{ $title ?? 'Dashboard' }}
                            @endif
                        </h1>
                        @hasSection('subtitle')
                        <p class="text-sm text-gray-500 hidden md:block">
                            @yield('subtitle')
                        </p>
                        @endif
                    </div>
                </div>

                <!-- Right section -->
                <div class="flex items-center space-x-4">
                    <!-- User dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-2 px-3 py-2 rounded-lg border border-gray-200 
                                          hover:border-gray-300 hover:bg-gray-50 transition-colors">
                                <div class="hidden md:block text-sm text-gray-700 font-medium">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="md:hidden text-sm font-medium text-gray-700">
                                    {{ strtok(Auth::user()->name, ' ') }}
                                </div>
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="page-content">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    
    <script>
        // Toggle sidebar function
        function toggleSidebar() {
            if (window.innerWidth < 1024) {
                // Mobile mode
                document.body.classList.toggle('sidebar-open');
                document.body.style.overflow = document.body.classList.contains('sidebar-open') ? 'hidden' : '';
            } else {
                // Desktop mode
                document.body.classList.toggle('sidebar-collapsed');
            }
            updateHamburgerIcon();
        }

        // Close sidebar function
        function closeSidebar() {
            document.body.classList.remove('sidebar-open');
            document.body.style.overflow = '';
            updateHamburgerIcon();
        }

        // Update hamburger icon
        function updateHamburgerIcon() {
            const hamburgerLines = document.getElementById('hamburgerLines');
            
            if (!hamburgerLines) return;
            
            if (window.innerWidth < 1024) {
                // Mobile mode
                if (document.body.classList.contains('sidebar-open')) {
                    hamburgerLines.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                } else {
                    hamburgerLines.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                }
            } else {
                // Desktop mode
                if (document.body.classList.contains('sidebar-collapsed')) {
                    hamburgerLines.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                } else {
                    hamburgerLines.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                }
            }
        }

        // Close sidebar when clicking links on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarLinks = document.querySelectorAll('.sidebar-container a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        closeSidebar();
                    }
                });
            });

            // Close sidebar with ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSidebar();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
                updateHamburgerIcon();
            });

            // Initial icon update
            updateHamburgerIcon();
        });
    </script>
</body>
</html>