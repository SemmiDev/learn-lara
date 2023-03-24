@extends('layouts.main')

@section('content')

@if ($tasks->count() === 0)
<div class="alert shadow-lg">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
      <div>
        <h3 class="font-bold">Ups!</h3>
        <div class="text-xs">Data belum ada :) </div>
      </div>
    </div>
    <div class="flex-none">
      <a
      href="/"
      class="btn btn-warning btn-sm">Kembali</a>
    </div>
  </div>
@endif

<form action="/search" class="mb-5 scale-95 flex justify-end" method="get">
  @csrf
  <input type="text" name="category" value="{{request('category')}}" hidden>
  <input type="text" name="keyword" required placeholder="Search.." class="input input-bordered input-sm w-full max-w-xs" />
  <input type="submit" hidden>
</form>

@foreach ($tasks as $task)
<div class="flex flex-col gap-2">
  <a
href="/tasks/{{ $task->id }}"
class="flex flex-col gap-x-2">
    <div class="space-y-3 p-5 rounded-lg border bg-gray-800 hover:bg-gray-900  text-yellow-500 transition-all duration-100 ease-linear shadow shadow-lg hover:scale-100 scale-95">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl items-center leading-relaxed font-bold">{{ $task->name }}</h1>
            <span class="text-xs  text-slate-900">{{ $task->priority }}</span>
        </div>

        <div class="flex flex-wrap gap-1">
        @foreach ($task->tags as $tag)
            <a
            href="/tasks/tags/{{ $tag->name }}"
            class="rounded-full hover:bg-secondary px-3 py-1 text-xs bg-info text-black">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
    <p class="text-info">{{ $task->description }}</p>
</div>
</a>
@endforeach


<div class="flex justify-center mt-5">
  {{
    $tasks->appends([
      'category' => request('category'),
      'keyword' => request('keyword')
    ])->links()
  }}
</div>
</div>
@endsection
