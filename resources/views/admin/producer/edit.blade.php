<x-app-layout>
    <x-slot name="slot">
        <h1>Edit Producers</h1>
        <form action="{{route('producerUpdate')}}" method="POST">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{$producer->id}}">
            <input type="text" name="name" placeholder="Введіть ім'я" value="{{$producer->name}}">
            <input type="text" name="description" placeholder="Введіть опис" value="{{$producer->description}}">
            <button type="submit">змiнити</button>
        </form>
    </x-slot>
</x-app-layout>