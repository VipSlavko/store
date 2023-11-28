<x-app-layout>
    <x-slot name="slot">
        <h1>Producer</h1>
            <h2>{{ $producer->name }}</h2>
            <p>{{ $producer->description }}</p>
            <a href="{{ route('producerEdit', $producer->id) }}">Edit</a>
            <form action="{{ route('producerDelete') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{$producer->id}}">
                <button type="submit">Delete</button>
            </form>
    </x-slot>
</x-app-layout>