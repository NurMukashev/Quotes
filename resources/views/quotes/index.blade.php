<x-layout>
    <h2 class="uppercase text-gray-700 text-3xl underline">Quotes</h2>
    @if(session('message'))
        <div>
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <ul class="text-indigo-700 font-medium">
        @foreach($quotes as $quote)
            <li>{{ $quote->name }}
                <a href="{{ route('quotes.edit', array('quote'=>$quote->id)) }}"> Edit  </a>
                <form method="post" action="{{ route('quotes.destroy', array('quote'=>$quote->id)) }}">
                    @method('delete')
                    @csrf
                    <input type="submit" name="submit" value="delete">
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
