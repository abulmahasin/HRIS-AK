<x-app-layout>
    @section('title', 'Data Pegawai')
    @section('subtitle', 'Desember 2025 - Yayasan Al-Kautsar')

    <div class="space-y-6">
        
        {{-- ## Header dan Filter 🚀 --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Data Pegawai</h2>
                <div class="flex items-center gap-2 mt-1 text-sm text-gray-600">
                    <span>Yayasan Al-Kautsar</span>
                    <span class="text-gray-400">•</span>
                    <span>Desember 2025</span>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                {{-- Dropdown Filter Departemen --}}
                <select id="filterDepartemen" class="border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                    <option value="">Semua Departemen</option>
                    <option value="Guru">Guru</option>
                    <option value="Administrasi">Administrasi</option>
                    <option value="Staf">Staf</option>
                </select>
                {{-- Dropdown Filter Status --}}
                <select id="filterStatus" class="border border-gray-300 rounded-lg px-3 py-2 text-sm text-gray-700 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Resign">Resign</option>
                </select>
                {{-- Tombol Tambah Pegawai --}}
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium text-sm transition duration-150 ease-in-out shadow-md hover:shadow-lg flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Pegawai
                </button>
            </div>
        </div>

        <hr>

        {{-- ## Statistik Pegawai 📊 --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            {{-- Total Employees Card --}}
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition duration-200">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Pegawai</p>
                        <p class="text-3xl font-bold mt-1 text-gray-900">236</p>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                        Lihat detail
                    </a>
                </div>
            </div>
            {{-- Tambahkan 3 Stat Card lain di sini --}}
        </div>

        <hr>

        {{-- ## Tabel Pegawai dengan Custom Datatable 📋 --}}
        <div class="datatable-wrapper bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            {{-- Controls untuk Custom Datatable --}}
            <div class="datatable-controls px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <h3 class="text-lg font-semibold text-gray-800">Daftar Pegawai</h3>
                        <div class="datatable-search">
                            <input type="text" 
                                   placeholder="Cari pegawai..." 
                                   class="border border-gray-300 rounded-lg px-3 py-1.5 text-sm focus:ring-blue-500 focus:border-blue-500 w-full md:w-64">
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-700">Tampilkan</span>
                            <select class="rows-per-page-select border border-gray-300 rounded-lg px-3 py-1 text-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-700">baris</span>
                        </div>
                        <button class="export-csv-btn px-3 py-1.5 text-sm border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition duration-150 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export CSV
                        </button>
                    </div>
                </div>
            </div>

            {{-- Table Content dengan Custom Datatable --}}
            <div class="relative">
                <div class="overflow-x-auto">
                    <table class="customDatatable min-w-full divide-y divide-gray-200" id="pegawaiTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[180px] sortable">
                                    Nama Pegawai
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px] sortable">
                                    ID
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Branch
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Organisasi
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Posisi
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[80px] sortable">
                                    Level
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px] sortable">
                                    Status
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[80px] sortable">
                                    Grade
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[80px] sortable">
                                    Kelas
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Bergabung
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Berakhir
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px]">
                                    Tanda Tangan
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Resign
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px]">
                                    Barcode
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[180px] sortable">
                                    Email
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Lahir
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px] sortable">
                                    Tempat Lahir
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[200px]">
                                    Alamat
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px]">
                                    Telepon
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px]">
                                    Agama
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px]">
                                    Gender
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[120px]">
                                    Status Nikah
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider min-w-[100px]">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($employees as $emp)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    {{-- Nama Pegawai --}}
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap font-medium">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center">
                                                    <span class="text-blue-600 font-bold text-xs">
                                                        {{ 
                                                            strtoupper(
                                                                substr($emp->full_name, 0, 1) . 
                                                                (isset(explode(' ', $emp->full_name)[1]) ? substr(explode(' ', $emp->full_name)[1], 0, 1) : '')
                                                            ) 
                                                        }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                {{ $emp->full_name }}
                                            </div>
                                        </div>
                                    </td>

                                    {{-- Employee ID --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->employee_id ?? '-' }}
                                    </td>

                                    {{-- Cabang --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->branch ?? '-' }}
                                    </td>

                                    {{-- Organisasi --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->organization->organization_name ?? '-' }}
                                    </td>

                                    {{-- Posisi --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->position ?? '-' }}
                                    </td>

                                    {{-- Level --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->level ?? '-' }}
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @php
                                            $status = $emp->status ?? '-';
                                            $color = $status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                                        @endphp
                                        <span class="px-2.5 py-0.5 text-xs font-semibold {{ $color }} rounded-full">
                                            {{ $status }}
                                        </span>
                                    </td>

                                    {{-- Grade --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->grade->grade_name ?? '-' }}
                                    </td>

                                    {{-- Kelas --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->class ?? '-' }}
                                    </td>

                                    {{-- Bergabung --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->joined_at?->format('d M Y') ?? '-' }}
                                    </td>

                                    {{-- Berakhir --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->ended_at?->format('d M Y') ?? '-' }}
                                    </td>

                                    {{-- Tanda Tangan --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->signature ?? '-' }}
                                    </td>

                                    {{-- Resign --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->resigned_at?->format('d M Y') ?? '-' }}
                                    </td>

                                    {{-- Barcode --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-md font-mono">
                                            {{ $emp->barcode ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- Email --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span class="truncate">{{ $emp->email ?? '-' }}</span>
                                        </div>
                                    </td>

                                    {{-- Lahir --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->birth_date?->format('d M Y') ?? '-' }}
                                    </td>

                                    {{-- Tempat Lahir --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->place_of_birth ?? '-' }}
                                    </td>

                                    {{-- Alamat --}}
                                    <td class="px-4 py-3 text-sm text-gray-500 max-w-xs overflow-hidden truncate" title="{{ $emp->address }}">
                                        {{ $emp->address ?? '-' }}
                                    </td>

                                    {{-- Telepon --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->phone_number ?? '-' }}
                                    </td>

                                    {{-- Agama --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->religion ?? '-' }}
                                    </td>

                                    {{-- Gender --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->gender ?? '-' }}
                                    </td>

                                    {{-- Status Nikah --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $emp->marital_status ?? '-' }}
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                        <div class="relative inline-block text-left">
                                            <button type="button" 
                                                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500 dropdown-toggle" 
                                                id="actions-menu-{{ $emp->employee_id }}" 
                                                aria-haspopup="true" 
                                                aria-expanded="true"
                                                onclick="toggleDropdown(this)">
                                                Actions
                                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                    
                                            <div class="origin-top-right absolute right-0 mt-2 w-36 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dropdown-menu hidden z-10" 
                                                role="menu" 
                                                aria-orientation="vertical" 
                                                aria-labelledby="actions-menu-{{ $emp->employee_id }}">
                                                <div class="py-1" role="none">
                                                    <a href="{{ url('/pegawai/' . $emp->employee_id) }}" 
                                                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" 
                                                        role="menuitem">
                                                        View
                                                    </a>
                                                    <a href="{{ url('/pegawai/' . $emp->employee_id . '/edit') }}" 
                                                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" 
                                                        role="menuitem">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="py-1" role="none">
                                                    <form action="{{ url('/pegawai/' . $emp->employee_id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                            class="text-red-600 w-full text-left block px-4 py-2 text-sm hover:bg-red-50 hover:text-red-700" 
                                                            role="menuitem">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Loading Overlay --}}
                <div class="datatable-loading">
                    <div class="text-center">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
                        <p class="mt-2 text-gray-600">Memuat data...</p>
                    </div>
                </div>
            </div>

            {{-- Pagination untuk Custom Datatable --}}
            <div class="datatable-pagination border-t border-gray-200 bg-gray-50"></div>
        </div>
    </div>

    {{-- Script untuk Filter dan Custom Functionality --}}
    @push('scripts')
    <script>
        // Fungsi dropdown (sama seperti sebelumnya)
        function closeAllDropdowns() {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.add('hidden');
            });
        }

        function toggleDropdown(button) {
            const menu = button.closest('.relative').querySelector('.dropdown-menu');
            
            closeAllDropdowns();

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                button.setAttribute('aria-expanded', 'true');
            } else {
                menu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
            }
        }

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.relative')) {
                closeAllDropdowns();
            }
        });

        // Fungsi untuk filter departemen dan status
        document.addEventListener('DOMContentLoaded', function() {
            const filterDepartemen = document.getElementById('filterDepartemen');
            const filterStatus = document.getElementById('filterStatus');
            
            if (filterDepartemen && filterStatus) {
                filterDepartemen.addEventListener('change', applyFilters);
                filterStatus.addEventListener('change', applyFilters);
            }
        });

        function applyFilters() {
            const departemen = document.getElementById('filterDepartemen').value;
            const status = document.getElementById('filterStatus').value;
            const searchInput = document.querySelector('.datatable-search input');
            
            // Build search term dari filter
            let searchTerm = '';
            if (departemen) {
                searchTerm += departemen + ' ';
            }
            if (status) {
                searchTerm += status + ' ';
            }
            
            // Jika ada search input dari custom datatable, update nilainya
            if (searchInput) {
                searchInput.value = searchTerm.trim();
                
                // Trigger input event untuk memicu filter
                const event = new Event('input', {
                    bubbles: true,
                    cancelable: true,
                });
                searchInput.dispatchEvent(event);
            }
        }

        // Fungsi untuk export semua data (bukan hanya yang terlihat)
        function exportAllData() {
            // Ambil semua data dari server atau tampilkan loading
            const loadingEl = document.querySelector('.datatable-loading');
            if (loadingEl) {
                loadingEl.classList.add('active');
            }
            
            // Kirim request ke server untuk export semua data
            fetch('{{ route("employees.export.excel") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    departemen: document.getElementById('filterDepartemen').value,
                    status: document.getElementById('filterStatus').value,
                    search: document.querySelector('.datatable-search input')?.value || ''
                })
            })
            .then(response => response.blob())
            .then(blob => {
                // Buat link download
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `pegawai_${new Date().toISOString().split('T')[0]}.csv`;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
                
                // Sembunyikan loading
                if (loadingEl) {
                    loadingEl.classList.remove('active');
                }
            })
            .catch(error => {
                console.error('Error exporting data:', error);
                alert('Gagal mengekspor data');
                if (loadingEl) {
                    loadingEl.classList.remove('active');
                }
            });
        }

        // Event listener untuk export button
        document.addEventListener('DOMContentLoaded', function() {
            const exportBtn = document.querySelector('.export-csv-btn');
            if (exportBtn) {
                exportBtn.addEventListener('click', exportAllData);
            }
        });
    </script>
    @endpush

    {{-- CSS Tambahan untuk Custom Datatable --}}
    <style>
        /* Responsif tabel */
        .overflow-x-auto {
            -webkit-overflow-scrolling: touch;
        }

        /* Styling untuk custom datatable */
        .customDatatable th.sortable:hover {
            background-color: #f3f4f6;
        }

        .customDatatable th.asc::after {
            border-bottom-color: #3b82f6;
        }

        .customDatatable th.desc::after {
            border-top-color: #3b82f6;
        }

        /* Highlight row saat hover */
        .customDatatable tbody tr:hover {
            background-color: #f9fafb;
        }

        /* Styling untuk pagination button aktif */
        .datatable-pagination button.active {
            background-color: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .datatable-controls {
                flex-direction: column;
                gap: 1rem;
            }
            
            .datatable-search input {
                width: 100% !important;
            }
            
            .customDatatable th,
            .customDatatable td {
                padding: 0.75rem 0.5rem;
                font-size: 0.75rem;
            }
            
            .datatable-pagination {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .datatable-pagination button {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
    </style>
</x-app-layout>