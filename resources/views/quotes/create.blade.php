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

    <form method="post" action="{{ route('quotes.store') }}" name="form">

        @csrf
        <input type="text" placeholder="Quote" name="name">

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
        <input type="submit" value="create">
    </form>
</x-layout>
