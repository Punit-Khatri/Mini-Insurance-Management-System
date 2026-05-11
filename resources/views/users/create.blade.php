<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create User') }}
            </h2>
    
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Users</a>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                        Email
                    </label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                </div>
                <div class="mb-4">
                    <label for="contact_number" class="block text-gray-700 text-sm font-bold mb-2">
                        Contact Number
                    </label>
                    <input type="text" name="contact_number" id="contact_number" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('contact_number') }}</span>
                </div>
                <div class="mb-4">
                    <label for="policy_id" class="block text-gray-700 text-sm font-bold mb-2">
                        Policy
                    </label>
                    <select name="policy_id" id="policy_id" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select Policy</option>
                        @foreach ($policies as $policy)
                            <option value="{{ $policy->id }}">{{ $policy->policy_name }}</option>
                        @endforeach
                    </select><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('policy_id') }}</span>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create User
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
