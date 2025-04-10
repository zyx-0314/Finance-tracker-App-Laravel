<x-app-layout>
    <!-- Header slot with the page title -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transactions') }}
        </h2>
    </x-slot>

    <!-- Main content area -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card container with light and dark theme support -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Page header for transactions list -->
                    <h1 class="text-2xl font-bold mb-6">Transaction List</h1>

                    <!-- Loop through all transactions -->
                    @foreach($transactions as $transaction)
                        <div class="mb-4 border p-4 rounded-lg">
                            <div class="mb-2">
                                <!-- Display type and amount -->
                                <span class="font-bold">{{ ucfirst($transaction->type) }}</span> - 
                                <span>${{ number_format($transaction->amount, 2) }}</span>
                            </div>
                            <!-- Transaction description -->
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <small>{{ $transaction->description }}</small>
                            </div>
                            <!-- Action links for edit and delete -->
                            <div class="mt-2 flex space-x-4">
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <!-- Delete form -->
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- Link to create a new transaction -->
                    <div class="mt-6">
                        <a href="{{ route('transactions.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add New Transaction
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
