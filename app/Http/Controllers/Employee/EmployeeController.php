<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\MasterOrganization;
use App\Models\MasterJobPosition;
use App\Models\MasterJobLevel;
use App\Models\MasterEmployeeStatus;
use App\Models\MasterGrade;
use App\Models\MasterMaritalStatus;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get filter parameters
        $organizationId = $request->get('organization');
        $statusId = $request->get('status');
        $jobPositionId = $request->get('job_position');
        $jobLevelId = $request->get('job_level');
        $gradeId = $request->get('grade');
        
        // Start query
        $query = Employee::with([
            'organization',
            'jobPosition',
            'jobLevel',
            'employeeStatus',
            'grade',
            'maritalStatus'
        ]);
        
        // Apply filters
        if ($organizationId) {
            $query->where('organization_id', $organizationId);
        }
        
        if ($statusId) {
            $query->where('employee_status_id', $statusId);
        }
        
        if ($jobPositionId) {
            $query->where('job_position_id', $jobPositionId);
        }
        
        if ($jobLevelId) {
            $query->where('job_level_id', $jobLevelId);
        }
        
        if ($gradeId) {
            $query->where('grade_id', $gradeId);
        }
        
        $employees = $query->orderBy('created_at', 'desc')->paginate(10);
        
        // Get master data for filters
        $organizations = MasterOrganization::orderBy('organization_name')->get();
        $employeeStatuses = MasterEmployeeStatus::orderBy('employee_status_name')->get();
        $jobPositions = MasterJobPosition::orderBy('job_position_name')->get();
        $jobLevels = MasterJobLevel::orderBy('job_level_name')->get();
        $grades = MasterGrade::orderBy('grade_name')->get();
        
        // Calculate statistics
        $totalEmployees = Employee::count();
        
        // Find active status ID (assuming status with name 'Aktif' or first status)
        $activeStatus = MasterEmployeeStatus::where('employee_status_name', 'like', '%aktif%')
            ->orWhere('employee_status_name', 'like', '%Aktif%')
            ->first();
        
        $activeEmployees = $activeStatus 
            ? Employee::where('employee_status_id', $activeStatus->id)->count()
            : 0;
        
        // Find resigned status ID
        $resignedStatus = MasterEmployeeStatus::where('employee_status_name', 'like', '%resign%')
            ->orWhere('employee_status_name', 'like', '%Resign%')
            ->first();
        
        $resignedEmployees = $resignedStatus
            ? Employee::where('employee_status_id', $resignedStatus->id)->count()
            : 0;
        
        // Count distinct branches
        $branchCount = Employee::whereNotNull('branch')->distinct('branch')->count('branch');
        
        return view('modules.employes.index', compact(
            'employees',
            'totalEmployees',
            'activeEmployees',
            'resignedEmployees',
            'branchCount',
            'organizations',
            'employeeStatuses',
            'jobPositions',
            'jobLevels',
            'grades'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = MasterOrganization::orderBy('organization_name')->get();
        $jobPositions = MasterJobPosition::orderBy('position_name')->get();
        $jobLevels = MasterJobLevel::orderBy('level_name')->get();
        $employeeStatuses = MasterEmployeeStatus::orderBy('status_name')->get();
        $grades = MasterGrade::orderBy('grade_name')->get();
        $maritalStatuses = MasterMaritalStatus::orderBy('status_name')->get();
        
        return view('modules.employes.create', compact(
            'organizations',
            'jobPositions',
            'jobLevels',
            'employeeStatuses',
            'grades',
            'maritalStatuses'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:50|unique:employees',
            'branch' => 'nullable|string|max:100',
            'job_position_id' => 'required|exists:master_job_positions,id',
            'organization_id' => 'required|exists:master_organizations,id',
            'job_level_id' => 'required|exists:master_job_levels,id',
            'employee_status_id' => 'required|exists:master_employee_statuses,id',
            'grade_id' => 'required|exists:master_grades,id',
            'marital_status_id' => 'required|exists:master_marital_statuses,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('employee-photos', 'public');
            $validated['photo'] = $path;
        }
        
        Employee::create($validated);
        
        return redirect()->route('employees.index')
            ->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with([
            'organization',
            'jobPosition',
            'jobLevel',
            'employeeStatus',
            'grade',
            'maritalStatus'
        ])->findOrFail($id);
        
        return view('modules.employes.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        
        $organizations = MasterOrganization::orderBy('organization_name')->get();
        $jobPositions = MasterJobPosition::orderBy('position_name')->get();
        $jobLevels = MasterJobLevel::orderBy('level_name')->get();
        $employeeStatuses = MasterEmployeeStatus::orderBy('status_name')->get();
        $grades = MasterGrade::orderBy('grade_name')->get();
        $maritalStatuses = MasterMaritalStatus::orderBy('status_name')->get();
        
        return view('modules.employes.edit', compact(
            'employee',
            'organizations',
            'jobPositions',
            'jobLevels',
            'employeeStatuses',
            'grades',
            'maritalStatuses'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_id' => 'required|string|max:50|unique:employees,employee_id,' . $id,
            'branch' => 'nullable|string|max:100',
            'job_position_id' => 'required|exists:master_job_positions,id',
            'organization_id' => 'required|exists:master_organizations,id',
            'job_level_id' => 'required|exists:master_job_levels,id',
            'employee_status_id' => 'required|exists:master_employee_statuses,id',
            'grade_id' => 'required|exists:master_grades,id',
            'marital_status_id' => 'required|exists:master_marital_statuses,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($employee->photo) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($employee->photo);
            }
            
            $path = $request->file('photo')->store('employee-photos', 'public');
            $validated['photo'] = $path;
        } else {
            // Keep existing photo if not updated
            unset($validated['photo']);
        }
        
        $employee->update($validated);
        
        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        
        // Delete photo if exists
        if ($employee->photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($employee->photo);
        }
        
        $employee->delete();
        
        return redirect()->route('employees.index')
            ->with('success', 'Pegawai berhasil dihapus.');
    }

    public function export(Request $request)
{
    $query = Employee::query();
    
    // Filter berdasarkan request
    if ($request->departemen) {
        $query->where('department', $request->departemen);
    }
    
    if ($request->status) {
        $query->where('status', $request->status);
    }
    
    if ($request->search) {
        $query->where(function($q) use ($request) {
            $q->where('full_name', 'like', '%' . $request->search . '%')
              ->orWhere('employee_id', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }
    
    $employees = $query->get();
    
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="pegawai.csv"',
    ];
    
    $callback = function() use ($employees) {
        $file = fopen('php://output', 'w');
        
        // Header CSV
        fputcsv($file, [
            'Nama Pegawai', 'ID', 'Branch', 'Organisasi', 'Posisi', 'Level',
            'Status', 'Grade', 'Kelas', 'Bergabung', 'Berakhir', 'Email',
            'Tanggal Lahir', 'Tempat Lahir', 'Alamat', 'Telepon', 'Agama',
            'Gender', 'Status Nikah'
        ]);
        
        // Data
        foreach ($employees as $emp) {
            fputcsv($file, [
                $emp->full_name,
                $emp->employee_id,
                $emp->branch,
                $emp->organization->organization_name ?? '-',
                $emp->position,
                $emp->level,
                $emp->status,
                $emp->grade->grade_name ?? '-',
                $emp->class,
                $emp->joined_at?->format('d M Y'),
                $emp->ended_at?->format('d M Y'),
                $emp->email,
                $emp->birth_date?->format('d M Y'),
                $emp->place_of_birth,
                $emp->address,
                $emp->phone_number,
                $emp->religion,
                $emp->gender,
                $emp->marital_status
            ]);
        }
        
        fclose($file);
    };
    
    return response()->stream($callback, 200, $headers);
}
}