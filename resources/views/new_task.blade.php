@extends('layouts.main')

@section('content')

<div class="flex flex-col max-w-lg p-6 mx-auto rounded-md sm:p-10">
	<div class="mb-8 text-center">
		<h1 class="my-3 text-4xl font-bold">New Task</h1>
	</div>
	<form method="post" action="/tasks/new" class="space-y-5 ng-untouched ng-pristine ng-valid">
		@csrf
		<div class="space-y-4">
			<div>
				<label for="name" class="block mb-2 text-sm">Task Name</label>
				<input type="text" name="name"
				value="{{ old('name') }}"
				required
				autofocus
				id="name" placeholder="Learn GO" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
				@error('name')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('name')
						 {{ $message }}
					@enderror
				</span>
			</div>

            <div>
                <label for="category" class="block mb-2 text-sm">Category</label>
                <div class="inline-block relative w-full">
                    <select
                    name="category"
                    required
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
                    @error('category')
                        border-red-600
                    @enderror
                    ">
                        <option
                        @if (old('category') == 'Urgent and Important')
                            selected
                        @endif
                        value="Urgent and Important">
                            Urgent and Important
                        </option>
                        <option
                        @if (old('category') == 'Not Urgent but Important')
                            selected
                        @endif
                        value="Not Urgent but Important">
                            Not Urgent but Important
                        </option>
                        <option
                        @if (old('category') == 'Urgent but Not Important')
                            selected
                        @endif
                        value="Urgent but Not Important">
                            Urgent but Not Important
                        </option>
                        <option
                        @if (old('category') == 'Not Urgent and Not Important')
                            selected
                        @endif
                        value="Not Urgent and Not Important">
                            Not Urgent and Not Important
                        </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <div>
                <label for="priority" class="block mb-2 text-sm">Priority</label>
                <div class="inline-block relative w-full">
                    <select
                    required
                    name="priority"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
                    @error('priority')
                        border-red-600
                    @enderror
                    ">
                        <option
                        @if (old('priority') == 'High')
                            selected
                        @endif
                        value="High">
                            High
                        </option>
                        <option
                        @if (old('priority') == 'Medium')
                            selected
                        @endif
                        value="Medium">
                            Medium
                        </option>
                        <option
                        @if (old('priority') == 'Low')
                            selected
                        @endif
                        value="Low">
                            Low
                        </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
            <div>
				<label for="due_date" class="block mb-2 text-sm">Due Date</label>
				<input type="text" name="due_date"
				value="{{ old('due_date') }}"
				required
				autofocus
				id="due_date"
                placeholder="2023-10-25"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
				@error('due_date')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('due_date')
						 {{ $message }}
					@enderror
				</span>
			</div>

        <div>
				<label for="assignee" class="block mb-2 text-sm">Assignee</label>
				<input type="text"
                name="assignee"
				value="{{ old('assignee') }}"
				required
				autofocus
				id="assignee"
                placeholder="Otong Suherno, Bambang Wijayanto"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
				@error('assignee')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('assignee')
						 {{ $message }}
					@enderror
				</span>
			</div>

            <div>
                <input
                    id="description"
                    required
                    type="hidden"
                    name="description">
                <trix-editor
                class="@error('description')
					border-red-600
				@enderror"
                input="description"></trix-editor>

                <span class="mt-2 text-xs text-error">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span>
            </div>

                	<div>
				<label for="tags" class="block mb-2 text-sm">Tags</label>
                <span class="text-xs text-primary">
                    Pisahkan dengan spasi
                </span>
				<input type="text"
				value="{{ old('tags') }}"
				autofocus
				id="tags" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline
				@error('tags')
					border-red-600
				@enderror
				">
				<span class="mt-2 text-xs text-error">
					@error('tags')
						 {{ $message }}
					@enderror
				</span>
			</div>
                <input type="text" name="tags" hidden id="tags-result">
                <div class="tags-inserted flex flex-wrap gap-1">
                </div>
		</div>

        <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-primary text-primary-content  mt-5">Create</button>
	</form>

    <script>
        const tags = document.querySelector('#tags');
        const tagsInserted = document.querySelector('.tags-inserted');

        // when input tags is space so it will be inserted
        tags.addEventListener('keyup', function(e) {
            if (e.key === ' ') {
                const tag = e.target.value;
                const span = document.createElement('span');
                span.classList.add('px-3', 'py-1', 'rounded-full', 'border', 'border-primary', 'mr-2', 'hover:bg-error', 'hover:text-white', 'cursor-pointer');
                span.textContent = tag;
                tagsInserted.appendChild(span);
                e.target.value = '';


                // insert into tags-result
                const tagsResult = document.querySelector('#tags-result');
                const tagsResultValue = tagsResult.value;
                tagsResult.value = tagsResultValue + tag + ' ';

                // when click span so it will be removed
                span.addEventListener('click', function(e) {
                    e.target.remove();

                    // remove from tags-result
                    const tagsResult = document.querySelector('#tags-result');
                    const tagsResultValue = tagsResult.value;
                    const tag = e.target.textContent;
                    const newTagsResultValue = tagsResultValue.replace(tag + ' ', '');
                    tagsResult.value = newTagsResultValue;
                });
            }
        });
    </script>
</div>
@endsection
