<div class="h-full flex flex-col bg-white">
    <!-- Sidebar Header -->
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900">TALENTES</h2>
            <!-- Close button for mobile -->
            <button onclick="closeSidebar()" 
                    class="lg:hidden p-1 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Company info -->
        <div class="mt-4">
            <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">HRIS System</div>
            <div class="text-sm text-gray-700 mt-1">Yayasan Al Kautsar Bandarlampung</div>
        </div>
    </div>

    <!-- Sidebar Content -->
    <div class="flex-1 overflow-y-auto py-4">
        <nav class="px-3 space-y-1">
            <!-- Navigation Group -->
            <div class="mb-6">
                <div class="px-3 mb-2">
                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Navigation
                    </span>
                </div>
                
                <div class="space-y-1">
                    <!-- Dashboard -->
                    @php
                        $isDashboardActive = request()->routeIs('dashboard');
                    @endphp
                    <a href="{{ route('dashboard') }}"
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isDashboardActive 
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500' 
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isDashboardActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Home</span>
                        @if($isDashboardActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>

                    <!-- Data Pegawai -->
                    @php
                        $isEmployeesActive = request()->routeIs('employees.index') || str_contains(request()->url(), 'employees');
                    @endphp
                    <a href="{{ route('employees.index') }}" 
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isEmployeesActive
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500'
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isEmployeesActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 8.651a4 4 0 01-7.5-3.45V15" />
                        </svg>
                        <span class="font-medium">Employees</span>
                        @if($isEmployeesActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>

                    <!-- Divisi & Unit Bisnis -->
                    @php
                        $isDivisionsActive = str_contains(request()->url(), 'division') || str_contains(request()->url(), 'divisi');
                    @endphp
                    <a href="#"
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isDivisionsActive
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500'
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isDivisionsActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <span class="font-medium">Divisi & Unit</span>
                        @if($isDivisionsActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>

                    <!-- Kehadiran -->
                    @php
                        $isAttendanceActive = str_contains(request()->url(), 'attendance') || str_contains(request()->url(), 'kehadiran');
                    @endphp
                    <a href="#"
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isAttendanceActive
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500'
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isAttendanceActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span class="font-medium">Kehadiran</span>
                        @if($isAttendanceActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>

                    <!-- Laporan -->
                    @php
                        $isReportsActive = str_contains(request()->url(), 'report') || str_contains(request()->url(), 'laporan');
                    @endphp
                    <a href="#"
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isReportsActive
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500'
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isReportsActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="font-medium">Laporan</span>
                        @if($isReportsActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Settings Group -->
            <div class="mb-6">
                <div class="px-3 mb-2">
                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Settings
                    </span>
                </div>
                
                <div class="space-y-1">
                    @php
                        $isSettingsActive = str_contains(request()->url(), 'setting') || str_contains(request()->url(), 'system');
                    @endphp
                    <a href="#"
                       class="group flex items-center px-3 py-2 rounded-lg transition-colors
                              {{ $isSettingsActive
                                 ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500'
                                 : 'text-gray-700 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-5 h-5 mr-3 {{ $isSettingsActive ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="font-medium">System Settings</span>
                        @if($isSettingsActive)
                            <span class="ml-auto w-2 h-2 bg-blue-500 rounded-full"></span>
                        @endif
                    </a>
                </div>
            </div>
        </nav>
    </div>

    <!-- User info for mobile ONLY -->
    <div class="border-t border-gray-200 p-4 lg:hidden">
        <div class="flex items-center">
            <div class="ml-3">
                <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Force hide on desktop jika Tailwind tidak bekerja */
    @media (min-width: 1024px) {
        button[onclick="closeSidebar()"] {
            display: none !important;
        }
        
        .border-t.border-gray-200.p-4.lg\:hidden {
            display: none !important;
        }
    }
</style>