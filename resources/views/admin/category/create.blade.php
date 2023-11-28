<x-app-layout>
    <x-slot name="slot">
        <h1>Create Categories</h1>
        <form action="{{route('categoryStore')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Введіть ім'я">
            <button type="submit">Створити</button>
        </form>
    </x-slot>
</x-app-layout>