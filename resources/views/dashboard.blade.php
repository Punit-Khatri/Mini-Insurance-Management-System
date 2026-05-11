<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h4 class="font-semibold text-lg text-gray-800 leading-tight mb-4">
                    Upcoming Payment Deadlines (2 Days)
                </h4>

                <table class="p-2 min-w-full bg-white border border-gray-200">
                    <thead class="p-2 text-center bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="py-2">ID</th>
                            <th class="py-2">User Name</th>
                            <th class="py-2">Policy Name</th>
                            <th class="py-2">Payment Due Date</th>
                            <th class="py-2">Download Policy Payment Receipt</th>
                        </tr>
                    </thead>
                    <tbody class="p-2 text-center border-b border-gray-200">
                        @if (!isset($upcomingPayments))
                            <tr>
                                <td colspan="5" class="py-2">No upcoming payments within the next 2 days.</td>
                            </tr>
                        @else
                            @foreach ($upcomingPayments as $payment)
                                <tr>
                                    <td class="py-2">{{ $payment->id }}</td>
                                    <td class="py-2">{{ $payment->name }}</td>
                                    <td class="py-2">{{ $payment->policy->policy_name }}</td>
                                    <td class="py-2">{{ $payment->policy->payment_due_date }}</td>
                                    <td class="py-2">
                                        <a href="{{ route('policies.downloadReceipt', $payment->policy->id) }}" class="text-blue-500 hover:text-blue-700">
                                            Download Receipt
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
