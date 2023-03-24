@extends('layouts.main')

@section('content')

<div class="flex items-center justify-center flex-col md:flex-row gap-3 w-full flex-wrap">
    <a
    href="/tasks?category=Urgent and Important"
    class="bg-success inline-block shadow shadow-lg hover:shadow-2xl shadow-success/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
    <span class="text-xs">#Urgent and Important</span>
    <h1 class="font-bold text-lg mt-3">DO</h1>
        <p class="text-sm">
            Do it now
        </p>
    </a>
    <a
    href="/tasks?category=Not Urgent but Important"
    class="bg-info inline-block shadow shadow-lg hover:shadow-2xl shadow-info/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
    <span class="text-xs">#Not Urgent but Important</span>
    <h1 class="font-bold text-lg mt-3">DECIDE</h1>
        <p class="text-sm">
            Schedule a time to do it
        </p>
    </a>
       <a
       href="/tasks?category=Urgent but Not Important"
       class="bg-warning inline-block shadow shadow-lg hover:shadow-2xl shadow-warning/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
       <span class="text-xs">#Urgent but Not Important</span>
       <h1 class="font-bold text-lg mt-3">DELEGATE</h1>
            <p class="text-sm">
                Who can do it for you?
            </p>
        </a>
        <a
        href="/tasks?category=Not Urgent and Not Important"
        class="bg-error p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 shadow shadow-lg hover:shadow-2xl shadow-error/40 leading-relaxed transition-all duration-200 ease-linear">
        <span class="text-xs">#Not Urgent and Not Important</span>
            <h1 class="font-bold text-lg mt-3">DELETE</h1>
            <p class="text-sm">
                Eliminate it
            </p>
        </a>
</div>
@endsection
