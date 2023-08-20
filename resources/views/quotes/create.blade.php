<x-layout>
    <main class="p-2">

        <h2 class="m-4 text-xl text-center">Creating new Quote</h2>

        @if($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('quotes.store') }}" class="mx-auto w-1/2 flex flex-col" name="form">

            @csrf
            <textarea name="name" placeholder="Quote" autofocus cols="30" rows="5" class="mb-4"></textarea>

            <label for="author_select">Author</label>
            <select name="author_id" id="author_select" class="mb-4">
                <option value="">-- Select the author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>

            <label for="categories_select">Categories</label>
            <select name="categories_id" id="categories_select" class="mb-4">
                <option value="">-- Select the category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input class="w-1/4 mx-auto px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800" style="cursor:pointer;" type="submit" value="create">
        </form>
    </main>
</x-layout>
