<x-layout>

    <main class="p-2">

        <h2 class="m-4 text-xl text-center">Creating new Category</h2>

        @if($errors->any())
            <div class="text-red-600">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('categories.store') }}" name="form" class="w-1/3 mx-auto flex flex-col">
            @csrf
            <input type="text" placeholder="category name" name="name" class="mb-4">
            <input class="w-1/4 mx-auto px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800" style="cursor:pointer" type="submit" value="create">
        </form>

    </main>

</x-layout>
