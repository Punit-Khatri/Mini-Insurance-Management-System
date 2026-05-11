<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
    
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</a>
        </div>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="p-2 min-w-full bg-white border border-gray-200">
                <thead class="p-2 text-center bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Role</th>
                        <th class="py-2">Contact Number</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="p-2 text-center border-b border-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-2">{{ $user->id }}</td>
                            <td class="py-2">{{ $user->name }}</td>
                            <td class="py-2">{{ $user->email }}</td>
                            <td class="py-2">{{ $user->role }}</td>
                            <td class="py-2">{{ $user->contact_number }}</td>
                            <td class="py-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
