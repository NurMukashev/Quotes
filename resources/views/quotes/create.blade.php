<x-layout>
    <h2>Creating new Quote</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <main>
        <form method="post" action="{{ route('quotes.store') }}" class="flex flex-col items-start" name="form">

            @csrf
            <textarea name="name" placeholder="Quote" autofocus cols="30" rows="10"></textarea>

            <label for="author_select">Author</label>
            <select name="author_id" id="author_select">
                <option value="">-- Select the author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>

            <label for="categories_select">Categories</label>
            <select name="categories_id" id="categories_select">
                <option value="">-- Select the category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input class="shadow-lg shadow-indigo-800 px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800" style="cursor:pointer;" type="submit" value="create">
        </form>
    </main>
</x-layout>
