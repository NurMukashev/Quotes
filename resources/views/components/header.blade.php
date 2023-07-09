<header>
    <a class="mt-4 ml-4" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <ul class="mb-4 p-2">
        <li><a class="inline-block" href="{{ route('quotes.index') }}">Quotes</a></li>
        <li><a class="inline-block" href="{{ route('authors.index') }}">Authors</a></li>
        <li><a class="inline-block" href="{{ route('categories.index') }}">Categories</a></li>
    </ul>
    <div class="mb-4 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
