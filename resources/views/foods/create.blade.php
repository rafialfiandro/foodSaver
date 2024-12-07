<h1>Add Food</h1>
<form action="{{ route('foods.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Food Name">
    <button type="submit">Add</button>
</form>
<a href="{{ route('foods.index') }}">Back</a>
