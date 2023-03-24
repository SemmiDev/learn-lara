@extends('layouts.main')

@section('content')

<div class="flex flex-col max-w-md p-6 mx-auto rounded-md sm:p-10 ">
	<div class="mb-8 text-center">
		<h1 class="my-3 text-4xl font-bold">Sign up</h1>
		<p class="text-sm text-gray-400">Sign up to create your account</p>
	</div>
	<form method="post" action="/register" class="space-y-5 ng-untouched ng-pristine ng-valid">
		@csrf
		<div class="space-y-4">

			<div>
				<label for="name" class="block mb-2 text-sm">Name</label>
				<input type="text" name="name" id="name" placeholder="sammi" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('name') is-invalid @enderror">
			</div>

			<div>
				<label for="email" class="block mb-2 text-sm">Email address</label>
				<input type="email" name="email" id="email" placeholder="sammi@gmail.com" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('email') is-invalid @enderror
				">
			</div>

		<div class="space-y-4">
			<div>
				<div class="flex justify-between mb-2">
					<label for="password" class="text-sm">Password</label>
					<a rel="noopener noreferrer" href="#" class="text-xs hover:underline text-gray-400">Forgot password?</a>
				</div>
				<input type="password" name="password" id="password" placeholder="*****" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('password') is-invalid @enderror
				">
			</div>
		</div>

		<div class="space-y-2">
			<div>
				<button type="button" type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-violet-400 text-gray-900">Sign up</button>
			</div>
			<p class="px-6 text-sm text-center text-gray-400">Already have an account?
				<a rel="noopener noreferrer" href="/login" class="hover:underline text-violet-400">Sign in</a>.
			</p>
		</div>
	</form>
</div>
@endsection
