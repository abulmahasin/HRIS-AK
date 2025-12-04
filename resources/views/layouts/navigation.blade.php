<!-- Header yang berada di sebelah kanan sidebar -->
<div class="main-header">
    <div class="header-container">
        <!-- Left section - Hamburger dan Title -->
        <div class="flex items-center">
            <button onclick="toggleSidebar()" 
                    class="p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 
                           transition-colors mr-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburgerLines">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
            <!-- Page Title -->
            <div>
                <h1 class="text-lg font-semibold text-gray-900">
                    @yield('title', 'Dashboard')
                </h1>
                <p class="text-sm text-gray-500 hidden md:block">
                    @yield('subtitle', 'Welcome back! Here\'s what\'s happening with your account.')
                </p>
            </div>
        </div>

        <!-- Right section - User info -->
        <div class="flex items-center space-x-4">
            <!-- User dropdown -->
            <div class="relative">
                <button onclick="toggleUserDropdown()" 
                        class="flex items-center space-x-2 px-3 py-2 rounded-lg border border-gray-200 
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
                
                <!-- Dropdown menu -->
                <div id="userDropdown" 
                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 
                            py-1 z-50 hidden transition-all duration-200">
                    <div class="px-4 py-3 border-b border-gray-100 md:hidden">
                        <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ Auth::user()->email }}</div>
                    </div>
                    
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="w-full flex items-center px-4 py-2 text-sm text-gray-700 
                                       hover:bg-gray-50 transition-colors text-left">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // User dropdown toggle
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('userDropdown');
        const dropdownBtn = document.querySelector('[onclick="toggleUserDropdown()"]');
        
        if (dropdown && dropdownBtn) {
            if (!dropdown.contains(event.target) && !dropdownBtn.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        }
    });

    // Close dropdown on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) {
                dropdown.classList.add('hidden');
            }
        }
    });
</script>