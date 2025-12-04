<x-app-layout>
    @section('title', 'Data Pegawai')
    @section('subtitle', 'Desember 2025 - Yayasan Al-Kautsar')

    <div class="space-y-6">
        <!-- Header dengan Filter -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Data Pegawai</h2>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-gray-600">Yayasan Al-Kautsar</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-gray-600">Desember 2025</span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>Semua Departemen</option>
                    <option>Guru</option>
                    <option>Administrasi</option>
                    <option>Staf</option>
                </select>
                <select class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option>Status Aktif</option>
                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Resign</option>
                </select>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Pegawai
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Total Employees Card -->
            <div class="bg-white p-6 rounded-xl border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Pegawai</p>
                        <p class="text-2xl font-bold mt-1">236</p>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                        Yayasan Al-Kautsar
                    </a>
                </div>
            </div>
        </div>

        <!-- Employee Table -->
        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                </svg>
                                Filter
                            </span>
                        </button>
                        <button class="px-3 py-1.5 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Ekspor
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Pegawai
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cabang
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Organisasi
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Posisi
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Level
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Grade
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bergabung
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Berakhir
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanda Tangan
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Resign
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Barcode
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Lahir
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tempat Lahir
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Telepon
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Agama
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Gender
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status Nikah
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Employee 1 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <span class="text-blue-600 font-medium text-xs">AA</span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            Aan Andriansyah, S.Pd. Gr.
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                001
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Pusat
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Yayasan Al-Kautsar
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Guru
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                III
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                A
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                10
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                01 Jan 2020
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                01 Jan 2020
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded inline-block">
                                    123456789
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    aanaan167@gmail.com
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                19 Feb 1980
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Tanjungkarang
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">
                                JL. HIDAYAH NO. 123
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                0812-3456-7890
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Islam
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Laki-laki
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Menikah
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-1">
                                    <button class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900 p-1 hover:bg-green-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Employee 2 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                                            <span class="text-green-600 font-medium text-xs">AM</span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            Abul Mahasih M Zainul Abidin, S.Kom.
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                002
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Cabang A
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Yayasan Al-Kautsar
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                IT Support
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                II
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                B
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                8
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                15 Mar 2021
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                15 Mar 2021
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded inline-block">
                                    234567890
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    abulmahash88@gmail.com
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                25 Okt 1995
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Sukoharum
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">
                                JL. HIU LATSITAR 45
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                0821-9876-5432
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Islam
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Laki-laki
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Belum Menikah
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-1">
                                    <button class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900 p-1 hover:bg-green-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Employee 3 -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8">
                                        <div class="h-8 w-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <span class="text-yellow-600 font-medium text-xs">AA</span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">
                                            Ade Adriansyah, S.Pd., M.Pd.
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                003
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Pusat
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Yayasan Al-Kautsar
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Kepala Sekolah
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                IV
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                A+
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                12
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                01 Jul 2018
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                01 Jul 2018
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded inline-block">
                                    345678901
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-3 h-3 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    adeadriansyah141185@gmail.com
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                14 Des 1985
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Palembang
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 max-w-xs truncate">
                                JL. ADI SUCIPTO 78
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                0813-4567-8901
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Islam
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Laki-laki
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                Menikah
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center gap-1">
                                    <button class="text-blue-600 hover:text-blue-900 p-1 hover:bg-blue-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900 p-1 hover:bg-green-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        Menampilkan 3 dari 236 pegawai
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <span class="text-sm text-gray-700 px-2">1</span>
                        <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        <select class="text-sm border border-gray-300 rounded-lg px-3 py-1 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option>10 baris</option>
                            <option>25 baris</option>
                            <option>50 baris</option>
                            <option>100 baris</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Menambahkan scroll horizontal untuk tabel pada layar kecil */
        @media (max-width: 768px) {
            .overflow-x-auto {
                -webkit-overflow-scrolling: touch;
            }
        }
        
        /* Memastikan tabel tidak terlalu padat */
        table {
            min-width: 2000px;
        }
        
        th, td {
            padding: 0.75rem 0.5rem;
        }
    </style>
</x-app-layout>