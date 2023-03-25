@extends('layouts.main')

@section('content')
    @if (session('status'))
        <div id="status"
            class="bg-green-100 border flex mx-auto justify-center mb-5 border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <script>
        setTimeout(function() {
            document.getElementById('status').style.display = 'none';
        }, 3000);
    </script>

    <div class="flex items-center justify-center flex-col md:flex-row gap-3 w-full flex-wrap">

        <a href="/tasks?category=Urgent and Important"
            class="bg-success text-success-content inline-block shadow shadow-lg hover:shadow-2xl shadow-success/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
            <span class="text-xs">#Urgent and Important</span>
            <h1 class="font-bold text-lg mt-3">DO</h1>
            <p class="text-sm">
                Do it now
            </p>
        </a>
        <a href="/tasks?category=Not Urgent but Important"
            class="bg-info text-info-content inline-block shadow shadow-lg hover:shadow-2xl shadow-info/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
            <span class="text-xs">#Not Urgent but Important</span>
            <h1 class="font-bold text-lg mt-3">DECIDE</h1>
            <p class="text-sm">
                Schedule a time to do it
            </p>
        </a>
        <a href="/tasks?category=Urgent but Not Important"
            class="bg-warning text-warning-content inline-block shadow shadow-lg hover:shadow-2xl shadow-warning/40 p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 leading-relaxed transition-all duration-200 ease-linear">
            <span class="text-xs">#Urgent but Not Important</span>
            <h1 class="font-bold text-lg mt-3">DELEGATE</h1>
            <p class="text-sm">
                Who can do it for you?
            </p>
        </a>
        <a href="/tasks?category=Not Urgent and Not Important"
            class="bg-error text-error-content p-5 w-60 h-36 rounded-lg hover:scale-100 scale-95 shadow shadow-lg hover:shadow-2xl shadow-error/40 leading-relaxed transition-all duration-200 ease-linear">
            <span class="text-xs">#Not Urgent and Not Important</span>
            <h1 class="font-bold text-lg mt-3">DELETE</h1>
            <p class="text-sm">Eliminate it
            </p>
        </a>
    </div>
@endsection
