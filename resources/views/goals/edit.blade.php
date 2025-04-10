<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Goal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-lg font-medium">Title</label>
                            <input type="text" name="title" id="title" value="{{ $goal->title }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-lg font-medium">Description</label>
                            <textarea name="description" id="description" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $goal->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="target_amount" class="block text-lg font-medium">Target Amount</label>
                            <input type="number" step="0.01" name="target_amount" id="target_amount" value="{{ $goal->target_amount }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Update Goal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
