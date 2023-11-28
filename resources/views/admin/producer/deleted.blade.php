<x-app-layout>
    <x-slot name="slot">
        <h1>Deleted Producers</h1>
        @foreach ($allProducers as $producer)
            <h2>{{ $producer->name }}</h2>
            <p>{{ $producer->description }}</p>
            <form action="{{ route('producerRestore') }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{$producer->id}}">
                <button type="submit">Restore</button>
            </form>
            <form action="{{ route('producerDestroy') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{$producer->id}}">
                <button type="submit">Destroy-Forever</button>
            </form>
        @endforeach
    </x-slot>
</x-app-layout>