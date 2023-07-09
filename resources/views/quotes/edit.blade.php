<x-layout>
    <h2>Editing Quote</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('quotes.update', array('quote' => $quote->id)) }}" name="form">
        @method('patch')
        @csrf
        <input type="text" name="name" value="{{ $quote->name }}">
        <input type="submit" value="edit">
    </form>
</x-layout>
