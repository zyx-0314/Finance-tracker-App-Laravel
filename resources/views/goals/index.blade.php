<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Goals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Goals List</h1>
                    @foreach($goals as $goal)
                        <div class="mb-4 border p-4 rounded-lg">
                            <div class="mb-2">
                                <span class="font-bold">{{ $goal->title }}</span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <p>{{ $goal->description }}</p>
                                <p class="mt-1">
                                    Target: ${{ number_format($goal->target_amount, 2) }} |
                                    Current: ${{ number_format($goal->current_amount, 2) }}
                                </p>
                            </div>
                            <div class="mt-2 flex space-x-4">
                                <a href="{{ route('goals.edit', $goal->id) }}" class="text-blue-500 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-6">
                        <a href="{{ route('goals.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Add New Goal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
