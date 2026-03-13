<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        <aside class="w-64 border-e bg-white px-4 py-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard', ['tab' => 'interactions']) }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium {{ $activeTab === 'interactions' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                        Interactions
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard', ['tab' => 'companies']) }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium {{ $activeTab === 'companies' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                        Company
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard', ['tab' => 'contacts']) }}"
                        class="block rounded-lg px-4 py-2 text-sm font-medium {{ $activeTab === 'contacts' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                        Contacts
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-8">
            <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
                <div class="p-6">
                    @if ($activeTab === 'companies')
                        <h2 class="text-xl font-bold mb-4">Companies</h2>
                        @forelse($companies as $company)
                            <div class="flex justify-between border-b pb-2 text-sm text-gray-600">
                                <div>
                                    <span class="font-bold text-gray-900">{{ $company->name }}</span>
                                    <span class="ml-2 text-xs text-gray-400">{{ $company->industry }}</span>
                                </div>
                                <span class="text-indigo-600">{{ $company->website }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500">No companies found. Click "Add Company" to start!</p>
                        @endforelse
                    @elseif ($activeTab === 'contacts')
                        <h2 class="text-xl font-bold mb-4">Contacts</h2>
                        @forelse($contacts as $contact)
                            <div
                                class="flex items-center justify-between border-b border-gray-100 py-4 last:border-0 hover:bg-gray-50/50 transition px-2 rounded-lg">

                                <div class="flex flex-col">
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold text-gray-900">{{ $contact->first_name }}
                                            {{ $contact->last_name }}</span>
                                        <span class="text-xs text-gray-400">|</span>
                                        <span class="text-sm text-gray-500">{{ $contact->position }}</span>
                                    </div>
                                    <a href="#" class="text-xs text-indigo-600 hover:underline font-medium">
                                        @ {{ $contact->company->name }}
                                    </a>
                                </div>

                                <div class="hidden md:flex flex-col text-right px-4">
                                    <span class="text-sm text-gray-600">{{ $contact->email }}</span>
                                    <span class="text-xs text-gray-400">{{ $contact->phone }}</span>
                                </div>

                                <div>
                                    @php
                                        $colors = [
                                            'lead' => 'bg-blue-100 text-blue-700 border-blue-200',
                                            'active' => 'bg-green-100 text-green-700 border-green-200',
                                            'opportunity' => 'bg-purple-100 text-purple-700 border-purple-200',
                                            'inactive' => 'bg-gray-100 text-gray-600 border-gray-200',
                                        ];
                                        $badgeClass =
                                            $colors[strtolower($contact->status)] ??
                                            'bg-gray-100 text-gray-600 border-gray-200';
                                    @endphp

                                    <span
                                        class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium {{ $badgeClass }} capitalize">
                                        {{ $contact->status }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">No contacts found. Click "Add Contact" to start!</p>
                        @endforelse
                    @else
                        <h2 class="text-xl font-bold mb-4">Interactions</h2>
                        @forelse($interactions as $interaction)
                            <div
                                class="flex items-center justify-between border-b border-gray-100 py-4 hover:bg-gray-50/80 transition px-3 rounded-xl group">

                                <div class="flex items-center gap-4">
                                    {{-- Dynamic Icon based on type --}}
                                    <div
                                        class="p-2.5 rounded-lg {{ $interaction->type === 'call' ? 'bg-green-100 text-green-600' : ($interaction->type === 'email' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600') }}">
                                        @if ($interaction->type === 'call')
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        @elseif($interaction->type === 'email')
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        @endif
                                    </div>

                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-gray-900">
                                            {{ ucfirst($interaction->type) }} with
                                            {{ $interaction->contact->first_name }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            {{ $interaction->company->name }} • Logged by
                                            {{ $interaction->user->name }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="text-right flex flex-col items-end">
                                        <span
                                            class="text-xs font-medium text-gray-500">{{ $interaction->updated_at->diffForHumans() }}</span>
                                        <span
                                            class="text-[10px] text-gray-400 uppercase tracking-widest">{{ $interaction->updated_at->format('M d') }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div
                                    class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-300 mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <p class="text-gray-400 text-sm">No interactions logged yet.</p>
                            </div>
                        @endforelse
                    @endif
                </div>
            </div>
        </main>

        <aside class="w-72 p-8 border-s bg-white">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider mb-6">Actions</h3>
            <div class="space-y-4">
                <a class="flex items-center justify-between rounded-lg bg-indigo-600 px-5 py-3 text-white transition hover:bg-indigo-700"
                    href="{{ route('interactions.create') }}">
                    <span class="text-sm font-medium">Add Interaction</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>

                <a class="flex items-center justify-between rounded-lg border border-indigo-600 px-5 py-3 text-indigo-600 transition hover:bg-indigo-50"
                    href="{{ route('companies.create') }}">
                    <span class="text-sm font-medium">Add Company</span>
                </a>

                <a class="flex items-center justify-between rounded-lg border border-indigo-600 px-5 py-3 text-indigo-600 transition hover:bg-indigo-50"
                    href="{{ route('contacts.create') }}">
                    <span class="text-sm font-medium">New Contact</span>
                </a>
            </div>
        </aside>
    </div>
</x-app-layout>
