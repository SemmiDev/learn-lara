@extends('layouts.main')

@section('content')

<div class="flex gap-x-2 items-center justify-end">
    <form action="/tasks/{{ $task->id }}/completed" method="POST" class="inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="bg-green-500 p-2 rounded-lg text-white">Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}</button>
    </form>

    <a href="/tasks/{{ $task->id }}/edit" class="p-2 w-24 flex items-center gap-1 justify-center rounded-lg text-white
    bg-blue-500 hover:bg-blue-600 transition-all duration-200
    ">
    <svg xmlns="http://www.w3.org/2000/svg"
    class="w-5 h-5 inline-block"
    viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925l-2 2H5v14h14v-6.95l2-2v8.95q0 .825-.588 1.413T19 23.7H5Zm7-9Zm4.175-8.425l1.425 1.4l-6.6 6.6V15.7h1.4l6.625-6.625l1.425 1.4l-6.625 6.625q-.275.275-.638.438t-.762.162H10q-.425 0-.713-.288T9 16.7v-2.425q0-.4.15-.763t.425-.637l6.6-6.6Zm4.275 4.2l-4.275-4.2l2.5-2.5q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-2.475 2.475Z"/></svg>

    Edit</a>
    <form action="/tasks/{{ $task->id }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 p-2 w-24 flex items-center gap-1 rounded-lg text-white">
            <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 inline-block"
            viewBox="0 0 24 24"><path fill="currentColor" d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg>
            Delete</button>
    </form>
</div>

<div
    href="/tasks/{{ $task->id }}"
    class="border-l-4 border mt-3 p-4 block rounded-lg mb-4">
    <div class="flex justify-between items-center">
        <h2 class="text-3xl text-yellow-500">{{ $task->name }}</h2>
        <span class="text-xs text-primary">
            {{ $task->priority }}
        </span>
    </div>
    <p class="text-sm  mt-5">{{ $task->description }}</p>

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
            <a
            href="/tasks/tags/{{ $tag->name }}"
            class="rounded-full hover:bg-secondary px-3 py-1 text-xs bg-info text-black">
            {{ $tag->name }}
        </a>
        @endforeach
    </div>
    </div>
</div>
@endsection
