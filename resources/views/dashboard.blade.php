<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h2 class="text-center text-2xl pb-4">Your Food List</h2>

                    @if($foods->isEmpty())
                        <div class="text-center text-gray-600">
                            <p>No items in the list.</p>
                        </div>
                    @else
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <tbody>
                            @foreach ($foods as $food)
                                <tr class="hover:bg-gray-100">
                                    <!-- Food Name column expands to fill remaining space -->
                                    <td class="border border-gray-300 px-4 py-2 w-full">{{ $food->name }}</td>

                                    <!-- Edit button only takes as much space as it needs -->
                                    <td class="border border-gray-300 px-4 py-2 text-center whitespace-nowrap">
                                        <a href="{{ route('dashboard.foods.edit', $food->id) }}"
                                           class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        EDIT
                                        </a>
                                    </td>

                                    <!-- Delete button only takes as much space as it needs -->
                                    <td class="border border-gray-300 px-4 py-2 text-center whitespace-nowrap">
                                        <form action="{{ route('dashboard.foods.destroy', $food->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <div class="mt-4">
                        {{ $foods->links() }}
                    </div>
                    @endif
                    <div class="justify-items-center justify-evenly">
                        <form action="{{ route('dashboard.foods.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Enter food name" required class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">ADD FOOD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
