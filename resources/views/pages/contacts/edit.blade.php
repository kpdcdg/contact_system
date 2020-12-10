<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h4>Edit Contact</h4>

            <form action="{{ url('contacts/' . $contact->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH')}}

                <div class="d-block p-2">
                    <label for="name" class="block font-medium text-sm text-gray-700">Name</name>
                    <input type="text" required name="name" value="{{ $contact->name }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-auto">
                </div>

                <div class="d-block p-2">
                    <label for="company" class="block font-medium text-sm text-gray-700">Company</label>
                    <input type="text" name="company" value="{{ $contact->company }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-auto">
                </div>
                <div class="d-block p-2">
                    <label for="phone" class="block font-medium text-sm text-gray-700">Phone</label>
                    <input type="text" name="phone" value="{{ $contact->phone }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-auto">
                </div>

                <div class="d-block p-2">
                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ $contact->email }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-auto">
                </div>

                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
