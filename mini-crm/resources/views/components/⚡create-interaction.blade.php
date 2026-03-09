<?php

use Livewire\Component;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;

new class extends Component {
    public $companies;
    public $contacts = [];
    public $selectedCompany = null;
    public $selectedContact = null;
    public $type = 'call';
    public $notes;

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function updatedSelectedCompany($companyId)
    {
        $this->contacts = Contact::where('company_id', $companyId)->get();
        $this->selectedContact = null;
    }

    public function save()
    {
        $this->validate([
            'selectedCompany' => 'required',
            'selectedContact' => 'required',
            'type' => 'required',
            'notes' => 'nullable|min:5',
        ]);

        Interaction::create([
            'user_id' => auth()->id(),
            'company_id' => $this->selectedCompany,
            'contact_id' => $this->selectedContact,
            'type' => $this->type,
            'notes' => $this->notes,
        ]);

        return redirect()->route('dashboard', ['tab' => 'interactions']);
    }
}; ?>

<div class="p-6">
    <form wire:submit="save" class="space-y-6">
        <div>
            <x-input-label :value="__('Company')" />
            <select wire:model.live="selectedCompany" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Select Company --</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label :value="__('Contact')" />
            <select wire:model="selectedContact" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Select Contact --</option>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label :value="__('Type')" />
            <select wire:model="type" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="call">Call</option>
                <option value="email">Email</option>
                <option value="meeting">Meeting</option>
            </select>
        </div>

        <div>
            <x-input-label :value="__('Notes')" />
            <textarea wire:model="notes" rows="3" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <x-primary-button>
            {{ __('Save Interaction') }}
        </x-primary-button>
    </form>
</div>
