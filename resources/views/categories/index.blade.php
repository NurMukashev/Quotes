<x-layout>
    <main class="flex flex-col items-center">

        <h2 class="m-2 text-3xl">Categories</h2>

        @if(session('message'))
            <div>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <table class="mt-7 w-1/2 font-medium">
            <tbody>
            @foreach($categories as $category)
                <tr class="border-b-2">
                    <td class="w-3/4">{{ $category->name }}</td>
                    <td><a href="{{ route('categories.edit', array('category'=>$category->id)) }}" class="m-2 px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800"> Edit </a></td>
                    <td>
                        <form method="post" action="{{ route('categories.destroy', array('category'=>$category->id)) }}">
                            @method('delete')
                            @csrf
                            <input type="submit" name="submit" value="delete" class="m-2 px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categories->onEachSide(1)->links() }}
        </div>

        <a href="{{ route('categories.create') }}" class="m-5 px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800">
            Create category
        </a>

    </main>
</x-layout>
