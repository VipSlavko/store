<x-app-layout>
    <x-slot name="slot">
        <h1>Category</h1>
            <h2>{{ $category->name }}</h2>
            <a href="{{ route('categoryEdit', $category->id) }}">Edit</a>
            <form action="{{ route('categoryDelete') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{$category->id}}">
                <button type="submit">Delete</button>
            </form>
    </x-slot>
</x-app-layout>