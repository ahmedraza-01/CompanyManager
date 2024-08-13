<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCompanies = Company::count();
        $totalEmployees = Employee::count();
        return view('dashboard', compact('totalCompanies', 'totalEmployees'));
    }
    
}
