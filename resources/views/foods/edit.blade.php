<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Food Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-5xl font-semibold mb-5">Edit Food</h1>

                    <!-- Edit Form -->
                    <form action="{{ route('dashboard.foods.update', $food->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Food Name Input -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Food Name</label>
                            <input type="text" id="name" name="name" value="{{ $food->name }}"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-green-300 focus:outline-none">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center">
                            <button type="submit"
                                    class="px-4 py-2 text-white font-semibold rounded bg-green-400 mr-5"
                                >Save Changes
                            </button>
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
