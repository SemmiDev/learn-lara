@extends('layouts.main')

@section('content')
    <div class="flex md:items-center gap-2  items-end flex-col md:flex-row justify-end">
        <form action="/tasks/{{ $task->id }}/completed" method="POST" class="inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="border-success border p-2 rounded-lg">Mark as
                {{ $task->completed ? 'Not Completed' : 'Completed' }}</button>
        </form>

        <a href="/tasks/{{ $task->id }}/edit"
            class="p-2 w-24 flex items-center gap-1 justify-center rounded-lg border-info border transition-all duration-200">
            <img src="/edit.svg" alt="add" class="w-5 h-5 fill-current stroke-white stroke-2" />
            Edit
        </a>

        <form action="/tasks/{{ $task->id }}" method="post" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="border-error border p-2 w-24 flex items-center gap-1 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z" />
                </svg>
                Delete</button>
        </form>
    </div>

    <div href="/tasks/{{ $task->id }}" class="border-l-4 border mt-3 p-4 block rounded-lg mb-4">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl text-yellow-500">{{ $task->name }}</h2>
                <span class="text-xs text-gray-800">{{ $task->created_at->diffForHumans() }}</span>
            </div>
            <span class="text-xs text-primary">
                {{ $task->priority }}
            </span>
        </div>
        <p class="text-sm  mt-5">
            {!! $task->description !!}
        </p>

        <div class="flex flex-wrap gap-1 mt-5 justify-between items-center">
            <div>
                <span class="text-xs">
                    Deadline: {{ $task->due_date }}
                </span>
                <p class="text-xs
            {{ $task->completed ? 'text-green-500' : 'text-red-500' }}
        ">
                    {{ $task->completed ? 'Completed' : 'Not Completed' }}
                </p>
            </div>

            <div class="flex gap-2 flex-wrap">
                @foreach ($task->tags as $tag)
                    <a href="/tasks/tags/{{ $tag->name }}"
                        class="rounded-full hover:bg-secondary px-3 py-1 text-xs bg-info text-black">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <span class="text-primary text-xs">
            {{ $task->assignee }}
        </span>
    </div>
@endsection
