<x-layout>
    <main class="p-2">

        <h2 class="m-2 text-xl">Editing Quote</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('quotes.update', array('quote' => $quote->id)) }}" name="form" class="flex flex-col items-start">

            @method('patch')
            @csrf

            <textarea name="name" autofocus cols="30" rows="5" class="mb-4">{{ $quote->name }}</textarea>

            <label for="author_select">Author</label>
            <select name="author_id" id="author_select" class="mb-4">
                <option value="">-- Select the author --</option>
                @foreach($authors as $author)
                        <option value="{{ $author->id }}" @if($quote->author_id != null && $author->id == $quote->author_id) selected @endif>{{ $author->name }}</option>
                @endforeach
            </select>

            <label for="categories_select">Categories</label>
            <select name="categories_id" id="categories_select" class="mb-4">
                <option value="">-- Select the category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($quote->categories_id != null && $category->id == $quote->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>

            <input type="submit" value="edit" class="px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800" style="cursor:pointer;">

        </form>
    </main>
</x-layout>
