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
                    {{ __("You're logged in!") }}
                    <h2>Your Food List</h2>

                    @if ($foods->isNotEmpty())
                        <ul>
                            @foreach ($foods as $food)
                                <li>{{ $food->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No food items found. Start adding your favorite foods!</p>
                    @endif

                    <h3>Add a New Food</h3>
                    <form action="{{ route('dashboard.foods.store') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Enter food name" required>
                        <button type="submit">Add Food</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
