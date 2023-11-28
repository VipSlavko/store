<x-app-layout>
    <x-slot name="slot">
        <h1>Create Producers</h1>
        <form action="{{route('producerStore')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Введіть ім'я">
            <input type="text" name="description" placeholder="Введіть опис">
            <button type="submit">Створити</button>
        </form>
    </x-slot>
</x-app-layout>