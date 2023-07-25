<x-layout>
    <main class="flex flex-col items-center">

        <h2 class="m-2 text-3xl">Quotes</h2>

        @if(session('message'))
            <div>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <table class="w-1/2 font-medium">
            <tbody>
                @foreach($quotes as $quote)
                    <tr class="border-b-2">
                        <td>{{ $quote->name }}</td>
                        <td><a href="{{ route('quotes.edit', array('quote'=>$quote->id)) }}" class="m-2 px-3 py-1 border-2 rounded-full border-indigo-800 text-indigo-800 hover:text-white hover:bg-indigo-800"> Edit </a></td>
                        <td>
                            <form method="post" action="{{ route('quotes.destroy', array('quote'=>$quote->id)) }}">
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
            {{ $quotes->onEachSide(1)->links() }}
        </div>
    </main>
</x-layout>
