<x-app-layout>
    <x-slot name="slot">
        <h1>Categories</h1>
        <a href="{{ route('categoryCreate') }}">Create</a>
        <a href="{{ route('categoryShowDeleted') }}">ShowDeleted</a>
        @foreach ($allCategories as $category)
            <h2>{{ $category->name }}</h2>
            <a href="{{ route('categoryEdit', $category->id) }}">Edit</a>
            <form action="{{ route('categoryDelete') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{$category->id}}">
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('categoryShow', $category->id) }}">Show</a>
        @endforeach
    </x-slot>
</x-app-layout>