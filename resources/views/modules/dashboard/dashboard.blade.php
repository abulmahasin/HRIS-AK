<x-app-layout>
    @section('title', 'Dashboard')
    @section('subtitle', 'Overview of your HRIS system')

    <div class="space-y-6">
        <!-- Welcome Banner -->
        <div class="gradient-banner p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p class="mt-2 opacity-90">Here's what's happening with your HRIS today.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="bg-white/20 text-sm px-4 py-2 rounded-lg font-medium">
                        {{ now()->format('l, F j, Y') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="dashboard-grid">
            <!-- Total Employees -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Employees</p>
                        <p class="text-2xl font-bold mt-1">1,248</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-green-600 mt-2">
                    <span class="font-medium">+5.2%</span> from last month
                </p>
            </div>

            <!-- Present Today -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Present Today</p>
                        <p class="text-2xl font-bold mt-1">1,105</p>
                    </div>
                    <div class="bg-green-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-green-600 mt-2">
                    <span class="font-medium">94.3%</span> attendance rate
                </p>
            </div>

            <!-- On Leave -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">On Leave</p>
                        <p class="text-2xl font-bold mt-1">43</p>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="font-medium">3.4%</span> of total employees
                </p>
            </div>

            <!-- Open Positions -->
            <div class="stat-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Open Positions</p>
                        <p class="text-2xl font-bold mt-1">12</p>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    <span class="font-medium">4</span> urgent positions
                </p>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activities -->
            <div class="stat-card">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Recent Activities</h3>
                        <p class="text-sm text-gray-500">Latest updates in your system</p>
                    </div>
                    <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        View All
                    </button>
                </div>
                
                <div class="space-y-4">
                    @foreach(range(1, 5) as $i)
                    <div class="flex items-start space-x-3 p-3 hover:bg-gray-50 rounded-lg">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">New employee joined</p>
                            <p class="text-xs text-gray-500 mt-1">John Doe joined as Senior Developer</p>
                            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="stat-card">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                    <p class="text-sm text-gray-500">Frequently used features</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <a href="#" class="p-4 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mb-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Add Employee</span>
                        </div>
                    </a>
                    
                    <a href="#" class="p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mb-2">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Attendance</span>
                        </div>
                    </a>
                    
                    <a href="#" class="p-4 border border-gray-200 rounded-lg hover:border-yellow-300 hover:bg-yellow-50 transition-colors">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center mb-2">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Leave Requests</span>
                        </div>
                    </a>
                    
                    <a href="#" class="p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mb-2">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Reports</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Department Table -->
        <div class="stat-card">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Department Overview</h3>
                <p class="text-sm text-gray-500">Employee distribution by department</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Head</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Employees</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Present Today</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach([
                            ['IT', 'John Smith', 45, 43, 'Active'],
                            ['HR', 'Sarah Johnson', 28, 27, 'Active'],
                            ['Finance', 'Michael Chen', 32, 30, 'Active'],
                            ['Marketing', 'Emma Wilson', 24, 22, 'Active'],
                            ['Operations', 'David Brown', 56, 54, 'Active']
                        ] as $dept)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $dept[0] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $dept[1] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $dept[2] }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $dept[3] }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    {{ $dept[4] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>