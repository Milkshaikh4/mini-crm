<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get the active tab from the URL (e.g., /dashboard?tab=companies)
        // If no tab is set, default to 'interactions'
        $activeTab = $request->query('tab', 'interactions');

        // Fetch data
        $companies = Company::latest()->get();

        $contacts = Contact::latest()->get();

        $interactions = Interaction::latest()->get();

        // Pass everything to the view
        return view('dashboard', [
            'activeTab' => $activeTab,
            'companies' => $companies,
            'contacts' => $contacts,
            'interactions' => $interactions
        ]);
    }
}
