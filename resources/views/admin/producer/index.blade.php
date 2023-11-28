<x-app-layout>
    <x-slot name="slot">
        <h1>Producers</h1>
        <a href="{{ route('producerCreate') }}">Create</a>
        <a href="{{ route('producerShowDeleted') }}">ShowDeleted</a>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($allProducers as $producer)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $producer->name }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $producer->description }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="{{ route('producerEdit', $producer->id) }}">Edit</a>
                    <a href="{{ route('producerShow', $producer->id) }}">Show</a>
                    <form action="{{ route('producerDelete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{$producer->id}}">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </x-slot>
</x-app-layout>
