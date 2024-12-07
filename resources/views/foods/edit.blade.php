<h1>Edit Food</h1>
<form action="{{ route('foods.update', $food->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $food->name }}">
    <button type="submit">Update</button>
</form>
<a href="{{ route('foods.index') }}">Back</a>
