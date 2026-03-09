<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInteractionRequest;
use App\Models\Interaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function create()
    {
        return view('interactions.create', [
            'companies' => Interaction::orderBy('updated_at')->get(),
        ]);
    }

    public function store(StoreInteractionRequest $request): RedirectResponse
    {
        // If code reaches here, validation has already passed!

        // Use $request->validated() to get only the data defined in your rules
        Interaction::create($request->validated());

        return redirect()->route('dashboard')
            ->with('success', 'Contact created successfully!');
    }
}
