<x-app-layout>
    <div class="py-12">
        <div class="w-2/3 mx-auto">
            <a href="{{ url('/contacts/create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Add Contact</a>

            <form method="GET">
                <div class="relative mt-4 text-gray-600 focus-within:text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </span>

                    <input type="search" name="q" class="py-2 text-sm text-black bg-white rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
                </div>
            </form>

            <div class="bg-white shadow-md rounded mt-3">

                <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Company</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->company }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->phone }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->email }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ url('contacts/' . $contact->id . '/edit')}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>

                                    <div x-data="{ open: false }">
                                        <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark" @click="open = true">Delete</button>

                                        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open">
                                            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">

                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                                    Delete Contact
                                                    </h3>

                                                    <div class="mt-2">
                                                        <p class="text-sm leading-5 text-gray-500">
                                                            Are you sure you want to delete {{ $contact->name }}?
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="mt-5 sm:mt-6">
                                                    <span class="flex w-full rounded-md shadow-sm">
                                                        <button @click="open = false" class="inline-flex justify-center px-4 py-2 mx-1 text-white bg-gray-500 rounded hover:bg-gray-700">
                                                            No
                                                        </button>

                                                        <form method="POST" action="{{ url('/contacts/' . $contact->id ) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <button class="inline-flex justify-center w-full px-4 py-2 mx-1 text-white bg-red-500 rounded hover:bg-red-700">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        </div>
    </div>
</x-app-layout>