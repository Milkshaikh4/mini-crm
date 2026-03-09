<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a Company Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('companies.store') }}" class="space-y-6 max-w-xl">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Company Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" name="website" type="url" placeholder="https://..."
                                class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('website')" />
                        </div>

                        <div>
                            <x-input-label for="industry" :value="__('Industry')" />
                            <select id="industry" name="industry"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Select an industry</option>
                                <option value="tech">Technology</option>
                                <option value="finance">Finance</option>
                                <option value="healthcare">Healthcare</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Notes')" />
                            <textarea id="description" name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Save Company') }}
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
