<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories | {{ config('app.name') }}</title>
</head>
<body>
<h2>Categories</h2>
@if(session('message'))
    <div>
        <p>{{ session('message') }}</p>
    </div>
@endif
<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}
            <a href="{{ route('categories.edit', array('category'=>$category->id)) }}"> Edit  </a>
            <form method="post" action="{{ route('categories.destroy', array('category'=>$category->id)) }}">
                @method('delete')
                @csrf
                <input type="submit" name="submit" value="delete">
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
