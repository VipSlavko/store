<x-app-layout>
    <x-slot name="slot">
        <h1>Edit Categories</h1>
        <form action="{{route('categoryUpdate')}}" method="POST">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{$category->id}}">
            <input type="text" name="name" placeholder="Введіть ім'я" value="{{$category->name}}">
            <button type="submit">змiнити</button>
        </form>
    </x-slot>
</x-app-layout>