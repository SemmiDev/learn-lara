@extends('layouts.main')

@section('content')

<div class="flex flex-col max-w-md p-6 mx-auto rounded-md sm:p-10">
	<div class="mb-8 text-center">
		<h1 class="my-3 text-4xl font-bold">Sign in</h1>
		<p class="text-sm text-gray-400">Sign in to access your account</p>
	</div>

	@error('email', 'password')
	<div class="alert alert-error shadow-lg">
		<div>
		  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
		  <span>Error! {{ $message }}.</span>
		</div>
	  </div>
	@enderror

	<form novalidate="" method="post" action="/login" class="space-y-5 ng-untouched ng-pristine ng-valid">
		@csrf
		<div class="space-y-4">
			<div>
				<label for="email" class="block mb-2 text-sm">Email address</label>
				<input type="email" name="email" id="email" placeholder="sammi@gmail.com" class="w-full px-3 py-2 border rounded-md border-gray-700
				@error('email') is-invalid @enderror
				">
			</div>
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
				<button type="button" type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-violet-400 text-gray-900">Sign in</button>
			</div>
			<p class="px-6 text-sm text-center text-gray-400">Don't have an account yet?
				<a rel="noopener noreferrer" href="/register" class="hover:underline text-violet-400">Sign up</a>.
			</p>
		</div>
	</form>
</div>
@endsection
