@extends('layouts.main')

@section('content')

<h1 class="font-bold text-xl text-center">
# {{ $tag }}
</h1>

@foreach ($tasks as $task)
<div class="flex flex-col mt-5 gap-2">
<a
    href="/tasks/{{ $task->id }}"
class="flex flex-col gap-x-2">
    <div class="space-y-3 p-5 rounded-lg border bg-sky-500/60 hover:bg-sky-500/80  transition-all duration-200 ease-linear shadow shadow-lg hover:scale-100 scale-95">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl items-center leading-relaxed font-bold">{{ $task->name }}</h1>
            <span class="text-xs text-slate-900">{{ $task->priority }}</span>
        </div>
        <div class="flex flex-wrap gap-1">
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aliquam alias. Totam aperiam eaque molestias, illo pariatur iure porro deserunt.</p>
</div>
</a>
@endforeach
</div>
@endsection
