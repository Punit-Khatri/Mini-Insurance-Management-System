<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Policy') }}
            </h2>
    
            <a href="{{ route('policies.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back to Policies</a>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('policies.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="policy_name" class="block text-gray-700 text-sm font-bold mb-2">
                        Policy Name
                    </label>
                    <input type="text" name="policy_name" id="policy_name" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('policy_name') }}</span>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                        Description
                    </label>
                    <input type="text" name="description" id="description" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('description') }}</span>
                </div>
                <div class="mb-4">
                    <label for="premium" class="block text-gray-700 text-sm font-bold mb-2">
                        Premium
                    </label>
                    <input type="text" name="premium" id="premium" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('premium') }}</span>
                </div>
                <div class="mb-4">
                    <label for="coverage_details" class="block text-gray-700 text-sm font-bold mb-2">
                        Coverage Details
                    </label>
                    <input type="text" name="coverage_details" id="coverage_details" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('coverage_details') }}</span>
                </div>
                <div class="mb-4">
                    <label for="payment_due_date" class="block text-gray-700 text-sm font-bold mb-2">
                        Payment Due Date
                    </label>
                    <input type="date" name="payment_due_date" id="payment_due_date" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><br>
                    <span class="text-red-500 text-sm">{{ $errors->first('payment_due_date') }}</span>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Policy
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
