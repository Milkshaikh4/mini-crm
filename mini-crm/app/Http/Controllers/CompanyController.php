<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('companies.create'); 
    }

    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        // If code reaches here, validation has already passed!
        
        // Use $request->validated() to get only the data defined in your rules
        Company::create($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Company created successfully!');
    }
}