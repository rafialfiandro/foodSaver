<h1>Your Food List</h1>
<a href="{{ route('foods.create') }}">Add Food</a>
<ul>
@foreach($foods as $food)
    <li>
        {{ $food->name }}
        <a href="{{ route('foods.edit', $food->id) }}">Edit</a>
        <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
    </ul>
