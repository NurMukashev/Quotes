<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authors | Quotes</title>
    </head>
    <body>
        <h2>Authors</h2>
        @if(session('message'))
            <div>
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <ul>
            @foreach($authors as $author)
                <li>{{ $author->name }}
                    <a href="{{ route('authors.edit', array('author'=>$author->id)) }}"> Edit  </a>
                    <form method="post" action="{{ route('authors.destroy', array('author'=>$author->id)) }}">
                        @method('delete')
                        @csrf
                        <input type="submit" name="submit" value="delete">
                    </form>
                </li>
            @endforeach
        </ul>
    </body>
</html>
