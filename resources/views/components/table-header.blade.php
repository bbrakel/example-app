<div class="sm:flex sm:items-center mb-6">
    <div class="sm:flex-auto">
        @isset($title)
            <h1 class="text-base font-semibold text-gray-900 dark:text-white">
                {{ Str::apa($title) }}
            </h1>
        @endisset

        @isset($description)
            <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">{{ $description }}</p>
        @endisset
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        @isset($tableActions)
            @foreach ($tableActions as $action)
                <button type="button"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:hover:bg-indigo-400 dark:focus-visible:outline-indigo-500">
                    {{ Str::apa(__("validation.actions.{$action}")) }}
                </button>
            @endforeach
        @endisset
    </div>
</div>