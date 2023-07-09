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
        <input type="submit" value="create">
    </form>
</x-layout>
