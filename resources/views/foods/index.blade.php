 <div class="container">
        <h1>Your Food List</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($foods) && $foods->count() > 0)
            <ul>
                @foreach ($foods as $food)
                    <li>{{ $food->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No foods found!</p>
        @endif

        <form action="{{ route('foods.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter food name" required>
            <button type="submit">Add Food</button>
        </form>
    </div>
