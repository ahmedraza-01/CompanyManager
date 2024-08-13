<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company)
    {
        $employees = $company->employees;
        return view('companies.employees.index', compact('employees', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('companies.employees.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Company $company)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Merge the company_id into the request data
        $data = $request->all();
        $data['company_id'] = $company->id;

        // Create the employee with the company_id
        $company->employees()->create($data);

        return redirect()->route('companies.employees.index', $company->id);
    }


    /**
     * Display the specified resource.
     */
    public function show( )
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
  
     public function edit(Company $company, Employee $employee)
     {
         // Ensure the employee belongs to the company
         if ($employee->company_id !== $company->id) {
             abort(403, 'Unauthorized action.');
         }
     
         return view('companies.employees.edit', compact('company', 'employee'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company, Employee $employee)
{
    // Ensure the employee belongs to the company
    if ($employee->company_id !== $company->id) {
        abort(403, 'Unauthorized action.');
    }

    // Validate the request data
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
    ]);

    // Update the employee record
    $employee->update($request->only(['first_name', 'last_name', 'email', 'phone']));

    return redirect()->route('companies.employees.index', $company->id)
                     ->with('success', 'Employee updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company, Employee $employee)
    {
        // Ensure the employee belongs to the company
        if ($employee->company_id !== $company->id) {
            abort(403, 'Unauthorized action.');
        }
    
        // Delete the employee record
        $employee->delete();
    
        return redirect()->route('companies.employees.index', $company->id)
                         ->with('success', 'Employee deleted successfully.');
    }
}
