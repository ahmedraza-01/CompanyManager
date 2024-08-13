<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('companies.index' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|max:2048',
        ]);
    
        // Initialize logoPath
        if ($request->hasFile('logo')) {
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
        }
      
        // Create a new company record
        $company = new Company([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
           // Save the logo path if available
        ]);
        $company->logo = $fileNameToStore;
    
        // Save the company to the database
        $company->save();
    
        // Redirect with a success message
        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }
    
        
    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=100,min_height=100|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        // Get the file's original name with the extension
        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        
        // Get just the extension
        $extension = $request->file('logo')->getClientOriginalExtension();
        
        // Create a new filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        
        // Store the file in the storage/public/logos directory
        $path = $request->file('logo')->storeAs('public/logos', $fileNameToStore);
    
        // Delete the old logo if it exists
        if ($company->logo) {
            Storage::delete('public/logos/' . $company->logo);
        }
    
        // Save the new logo's filename in the database
        $company->logo = $fileNameToStore;
    }

    // Update the company's data
    $company->name = $request->input('name');
    $company->email = $request->input('email');
    $company->website = $request->input('website');

    // Save the changes
    $company->save();

    // Redirect to the companies index with a success message
    return redirect()->route('companies.index')->with('success', 'Company updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        {
          
                if ($company->picture) {
                    Storage::delete('public/logos/' . $company->picture);
                } 
                
            
          
            $company->delete();
          
    
           
    
            return redirect()->route('companies.index')->with('success', 'companie deleted successfully');
        }
    }
}
