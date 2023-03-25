@extends('layouts.main')

@section('content')

<div class="flex flex-col max-w-md p-6 mx-auto rounded-md sm:p-10">
	@if (session('status'))
		<div
		id="status"
		class="bg-success border border-success text-success-content px-4 py-3 rounded relative
		{{
			session('status')!= 'Login successful. Welcome back!'||
			session('status') != 'Registration successful. Please login.'
			?? 'border-error text-error-content bg-error'
		}}
		" role="alert">
			<strong class="font-bold">
				{{
					session('status') != 'Login successful. Welcome back!'||
					session('status') != 'Registration successful. Please login.'
					? 'Success!' : 'Error!'
				}}
			</strong>
			<span class="block sm:inline">{{ session('status') }}</span>
		</div>
	@endif

	<script>
		setTimeout(function() {
			document.getElementById('status').style.display = 'none';
		}, 2000);
	</script>

	<div class="mb-8 text-center">
		<h1 class="my-3 text-4xl font-bold">Sign in</h1>
		<p class="text-sm text-gray-400">Sign in to access your account</p>
	</div>
	<form method="post" action="/login" class="space-y-5 ng-untouched ng-pristine ng-valid">
		@csrf
		<div class="space-y-4">
			<div>
				<label for="email" class="block mb-2 text-sm">Email address</label>
				<input type="email" name="email"
				value="{{ old('email') }}"
				required
				autofocus
				@required(true)
				id="email" placeholder="sammi@gmail.com" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('email')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('email')
						 {{ $message }}
					@enderror
				</span>
			</div>
			<div>
				<div class="flex justify-between mb-2">
					<label for="password" class="text-sm">Password</label>
				</div>
				<input
				type="password"
				value="{{ old('password') }}"
				required
				@required(true)
				name="password" id="password" placeholder="*****" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('password')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('password')
						 {{ $message }}
					@enderror
				</span>
			</div>
		</div>
		<div class="space-y-2">
			<div>
				<button type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-primary text-primary-content">Sign in</button>
			</div>
			<p class="px-6 text-sm text-center text-gray-400">Don't have an account yet?
				<a rel="noopener noreferrer" href="/register" class="hover:underline text-violet-400">Sign up</a>.
			</p>
		</div>
	</form>
</div>
@endsection
