<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contacts.create', [
            'companies' => Company::orderBy('name')->get(),
        ]);
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        // If code reaches here, validation has already passed!

        // Use $request->validated() to get only the data defined in your rules
        Contact::create($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Contact created successfully!');
    }
}
