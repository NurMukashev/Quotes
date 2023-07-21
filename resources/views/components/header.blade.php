<header class="p-2 text-gray-800 flex justify-between items-center border-b-2">
    <div class="flex flex-start items-center">
        <a class="mx-3 uppercase text-2xl text-indigo-800" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <ul class="p-2 text-lg flex justify-between items-center border-x-2">
            <li><a class="mr-1 p-1 hover:text-indigo-800 hover:underline decoration-2 decoration-indigo-800 underline-offset-2" href="{{ route('quotes.index') }}">Quotes</a></li>
            <li><a class="mr-1 p-1 hover:text-indigo-800 hover:underline decoration-2 decoration-indigo-800 underline-offset-2" href="{{ route('authors.index') }}">Authors</a></li>
            <li><a class="p-1 hover:text-indigo-800 hover:underline decoration-2 decoration-indigo-800 underline-offset-2" href="{{ route('categories.index') }}">Categories</a></li>
        </ul>
    </div>
    <div class="mb-4 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold hover:text-indigo-800 hover:underline decoration-2 decoration-indigo-800 underline-offset-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold hover:text-indigo-800 hover:underline decoration-2 decoration-indigo-800 underline-offset-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
