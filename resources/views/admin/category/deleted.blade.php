<x-app-layout>
    <x-slot name="slot">
        <h1>Deleted Categories</h1>
        @foreach ($allCategories as $category)
            <h2>{{ $category->name }}</h2>
            <form action="{{ route('categoryRestore') }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{$category->id}}">
                <button type="submit">Restore</button>
            </form>
            <form action="{{ route('categoryDestroy') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{$category->id}}">
                <button type="submit">Destroy-Forever</button>
            </form>
        @endforeach
    </x-slot>
</x-app-layout>