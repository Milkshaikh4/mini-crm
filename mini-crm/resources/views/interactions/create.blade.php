<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an interactions Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('interactions.store') }}" class="space-y-6 max-w-xl">
                        @csrf

                        <div>
                            <x-input-label for="company_id" :value="__('Company')" />
                            <select id="company_id" name="company_id" required
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">-- Select a Company --</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('company_id')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select id="type" name="type"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="lead">Email</option>
                                <option value="active">Call</option>
                                <option value="opportunity">Face-to-Face</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="notes" :value="__('Notes')" />
                            <textarea id="notes" name="notes" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('notes')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Save Contact') }}
                            </x-primary-button>

                            <a href="{{ route('dashboard') }}"
                                class="text-sm text-gray-600 hover:text-gray-900 underline">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
