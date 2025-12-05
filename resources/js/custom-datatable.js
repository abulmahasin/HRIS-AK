/* resources/js/customDatatable.js */
/**
 * CUSTOM DATATABLE - HRIS AK
 * Fitur: Search, Sort, Pagination, Rows per page
 */

class CustomDataTable {
    constructor(tableElement) {
        this.table = tableElement;
        this.wrapper = tableElement.closest('.datatable-wrapper');
        
        if (!this.wrapper) {
            console.warn('No .datatable-wrapper found for table', tableElement);
            return;
        }
        
        this.tbody = this.table.querySelector('tbody');
        this.originalRows = Array.from(this.tbody.querySelectorAll('tr'));
        this.filteredRows = [...this.originalRows];
        
        this.currentPage = 1;
        this.rowsPerPage = 10;
        this.currentSort = { column: null, direction: 'asc' };
        
        // Elemen kontrol
        this.searchInput = this.wrapper.querySelector('.datatable-search input');
        this.rowsPerPageSelect = this.wrapper.querySelector('.rows-per-page-select');
        this.paginationContainer = this.wrapper.querySelector('.datatable-pagination');
        
        this.init();
    }
    
    init() {
        console.log('Initializing CustomDataTable...');
        
        // Setup event listeners
        this.setupSearch();
        this.setupRowsPerPage();
        this.setupSorting();
        
        // Render awal
        this.render();
    }
    
    setupSearch() {
        if (!this.searchInput) return;
        
        this.searchInput.addEventListener('input', (e) => {
            this.currentPage = 1;
            this.filterRows(e.target.value);
            this.render();
        });
    }
    
    setupRowsPerPage() {
        if (!this.rowsPerPageSelect) return;
        
        this.rowsPerPage = parseInt(this.rowsPerPageSelect.value);
        
        this.rowsPerPageSelect.addEventListener('change', (e) => {
            this.rowsPerPage = parseInt(e.target.value);
            this.currentPage = 1;
            this.render();
        });
    }
    
    setupSorting() {
        const headers = this.table.querySelectorAll('th');
        
        headers.forEach((header, index) => {
            if (header.classList.contains('sortable')) {
                header.style.cursor = 'pointer';
                
                header.addEventListener('click', () => {
                    this.sortByColumn(index);
                });
            }
        });
    }
    
    filterRows(searchTerm) {
        if (!searchTerm || searchTerm.trim() === '') {
            this.filteredRows = [...this.originalRows];
            return;
        }
        
        const term = searchTerm.toLowerCase().trim();
        
        this.filteredRows = this.originalRows.filter(row => {
            const cells = Array.from(row.querySelectorAll('td'));
            return cells.some(cell => 
                cell.textContent.toLowerCase().includes(term)
            );
        });
    }
    
    sortByColumn(columnIndex) {
        const header = this.table.querySelectorAll('th')[columnIndex];
        
        // Reset sort di header lain
        this.table.querySelectorAll('th').forEach(h => {
            if (h !== header) {
                h.classList.remove('asc', 'desc');
            }
        });
        
        // Tentukan arah sorting
        let direction = 'asc';
        if (this.currentSort.column === columnIndex) {
            direction = this.currentSort.direction === 'asc' ? 'desc' : 'asc';
        }
        
        // Update UI header
        header.classList.remove('asc', 'desc');
        header.classList.add(direction);
        
        // Update state
        this.currentSort = { column: columnIndex, direction };
        
        // Sort rows
        this.filteredRows.sort((a, b) => {
            const cellA = a.children[columnIndex]?.textContent?.trim() || '';
            const cellB = b.children[columnIndex]?.textContent?.trim() || '';
            
            // Coba parsing sebagai angka
            const numA = parseFloat(cellA.replace(/[^\d.-]/g, ''));
            const numB = parseFloat(cellB.replace(/[^\d.-]/g, ''));
            
            if (!isNaN(numA) && !isNaN(numB)) {
                return direction === 'asc' ? numA - numB : numB - numA;
            }
            
            // Sort sebagai string
            return direction === 'asc' 
                ? cellA.localeCompare(cellB, undefined, { numeric: true })
                : cellB.localeCompare(cellA, undefined, { numeric: true });
        });
        
        // Re-append rows
        this.filteredRows.forEach(row => this.tbody.appendChild(row));
        
        // Render ulang dengan sorting baru
        this.render();
    }
    
    render() {
        // Hitung pagination
        const totalRows = this.filteredRows.length;
        const totalPages = Math.ceil(totalRows / this.rowsPerPage);
        
        // Validasi current page
        if (this.currentPage > totalPages && totalPages > 0) {
            this.currentPage = totalPages;
        } else if (this.currentPage < 1 && totalRows > 0) {
            this.currentPage = 1;
        }
        
        // Sembunyikan semua baris
        this.originalRows.forEach(row => {
            row.style.display = 'none';
            row.classList.remove('even', 'odd');
        });
        
        // Tentukan indeks untuk halaman saat ini
        const startIndex = (this.currentPage - 1) * this.rowsPerPage;
        const endIndex = startIndex + this.rowsPerPage;
        
        // Tampilkan baris untuk halaman saat ini
        const pageRows = this.filteredRows.slice(startIndex, endIndex);
        
        pageRows.forEach((row, index) => {
            row.style.display = '';
            // Tambahkan class even/odd untuk striping
            row.classList.add(index % 2 === 0 ? 'even' : 'odd');
        });
        
        // Update pagination
        this.updatePagination(totalRows, totalPages);
        
        // Update info text
        this.updateInfoText(totalRows, startIndex, endIndex);
    }
    
    updatePagination(totalRows, totalPages) {
        if (!this.paginationContainer) return;
        
        // Kosongkan pagination
        this.paginationContainer.innerHTML = '';
        
        if (totalRows === 0) {
            const noDataMsg = document.createElement('div');
            noDataMsg.className = 'text-center text-gray-500 py-4';
            noDataMsg.textContent = 'Tidak ada data yang ditemukan';
            this.paginationContainer.appendChild(noDataMsg);
            return;
        }
        
        // Previous button
        const prevBtn = this.createPaginationButton('←', 'Sebelumnya', this.currentPage > 1);
        prevBtn.addEventListener('click', () => {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.render();
            }
        });
        this.paginationContainer.appendChild(prevBtn);
        
        // Page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, this.currentPage - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
        
        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }
        
        // First page
        if (startPage > 1) {
            const firstBtn = this.createPaginationButton('1', 'Halaman pertama', true);
            firstBtn.addEventListener('click', () => {
                this.currentPage = 1;
                this.render();
            });
            this.paginationContainer.appendChild(firstBtn);
            
            if (startPage > 2) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-2 text-gray-500';
                ellipsis.textContent = '...';
                this.paginationContainer.appendChild(ellipsis);
            }
        }
        
        // Numbered pages
        for (let i = startPage; i <= endPage; i++) {
            const pageBtn = this.createPaginationButton(i.toString(), `Halaman ${i}`, true);
            
            if (i === this.currentPage) {
                pageBtn.classList.add('active');
            }
            
            pageBtn.addEventListener('click', () => {
                this.currentPage = i;
                this.render();
            });
            
            this.paginationContainer.appendChild(pageBtn);
        }
        
        // Last page
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-2 text-gray-500';
                ellipsis.textContent = '...';
                this.paginationContainer.appendChild(ellipsis);
            }
            
            const lastBtn = this.createPaginationButton(totalPages.toString(), 'Halaman terakhir', true);
            lastBtn.addEventListener('click', () => {
                this.currentPage = totalPages;
                this.render();
            });
            this.paginationContainer.appendChild(lastBtn);
        }
        
        // Next button
        const nextBtn = this.createPaginationButton('→', 'Berikutnya', this.currentPage < totalPages);
        nextBtn.addEventListener('click', () => {
            if (this.currentPage < totalPages) {
                this.currentPage++;
                this.render();
            }
        });
        this.paginationContainer.appendChild(nextBtn);
    }
    
    updateInfoText(totalRows, startIndex, endIndex) {
        // Cari atau buat elemen info text
        let infoText = this.paginationContainer?.querySelector('.datatable-info');
        
        if (!infoText && this.paginationContainer) {
            infoText = document.createElement('div');
            infoText.className = 'datatable-info text-sm text-gray-600 ml-4';
            this.paginationContainer.appendChild(infoText);
        }
        
        if (infoText) {
            if (totalRows === 0) {
                infoText.textContent = 'Tidak ada data';
            } else {
                const displayedStart = Math.min(totalRows, startIndex + 1);
                const displayedEnd = Math.min(totalRows, endIndex);
                infoText.textContent = `Menampilkan ${displayedStart}-${displayedEnd} dari ${totalRows} data`;
            }
        }
    }
    
    createPaginationButton(text, title, enabled = true) {
        const button = document.createElement('button');
        button.type = 'button';
        button.textContent = text;
        button.title = title;
        
        button.className = 'px-3 py-1.5 mx-1 rounded-md border border-gray-300 text-sm font-medium ' +
                         'transition-colors duration-150';
        
        if (enabled) {
            button.className += ' bg-white text-gray-700 hover:bg-gray-50 hover:border-gray-400';
        } else {
            button.className += ' bg-gray-100 text-gray-400 cursor-not-allowed';
            button.disabled = true;
        }
        
        if (text === this.currentPage.toString()) {
            button.className += ' bg-blue-600 text-white border-blue-600 hover:bg-blue-700 hover:border-blue-700';
        }
        
        return button;
    }
    
    // Public methods
    refresh() {
        // Refresh data dari server (jika perlu)
        this.originalRows = Array.from(this.tbody.querySelectorAll('tr'));
        this.filteredRows = [...this.originalRows];
        this.currentPage = 1;
        this.render();
    }
    
    setRowsPerPage(value) {
        this.rowsPerPage = parseInt(value);
        this.currentPage = 1;
        this.render();
    }
    
    search(term) {
        if (this.searchInput) {
            this.searchInput.value = term;
        }
        this.filterRows(term);
        this.currentPage = 1;
        this.render();
    }
    
    exportToCSV(filename = 'data.csv') {
        const rows = this.table.querySelectorAll('tr');
        const csvContent = [];
        
        rows.forEach(row => {
            const rowData = [];
            const cells = row.querySelectorAll('th, td');
            
            cells.forEach(cell => {
                // Bersihkan teks dan handle quotes
                let text = cell.textContent.trim();
                text = text.replace(/"/g, '""'); // Escape quotes
                
                // Jika ada koma atau quotes, wrap dengan quotes
                if (text.includes(',') || text.includes('"')) {
                    text = `"${text}"`;
                }
                
                rowData.push(text);
            });
            
            csvContent.push(rowData.join(','));
        });
        
        // Create download link
        const blob = new Blob([csvContent.join('\n')], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Inisialisasi semua custom datatable
document.addEventListener('DOMContentLoaded', function() {
    console.log('Custom Datatable script loaded');
    
    const tables = document.querySelectorAll('.customDatatable');
    const datatables = [];
    
    tables.forEach(table => {
        const datatable = new CustomDataTable(table);
        if (datatable.wrapper) { // Cek jika berhasil diinisialisasi
            datatables.push(datatable);
        }
    });
    
    console.log(`Initialized ${datatables.length} custom datatable(s)`);
    
    // Simpan di window untuk akses dari console jika perlu
    window.customDatatables = datatables;
    
    // Tambahkan event listener untuk tombol export jika ada
    document.querySelectorAll('.export-csv-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tableId = this.dataset.tableId || this.closest('.datatable-wrapper').querySelector('.customDatatable').id;
            const table = document.getElementById(tableId);
            const datatable = datatables.find(dt => dt.table === table);
            if (datatable) {
                datatable.exportToCSV();
            }
        });
    });
});

// Fungsi helper untuk refresh tabel tertentu
function refreshDataTable(tableId) {
    const table = document.getElementById(tableId);
    if (table && window.customDatatables) {
        const datatable = window.customDatatables.find(dt => dt.table === table);
        if (datatable) {
            datatable.refresh();
        }
    }
}

// Fungsi helper untuk search di tabel tertentu
function searchDataTable(tableId, searchTerm) {
    const table = document.getElementById(tableId);
    if (table && window.customDatatables) {
        const datatable = window.customDatatables.find(dt => dt.table === table);
        if (datatable) {
            datatable.search(searchTerm);
        }
    }
}