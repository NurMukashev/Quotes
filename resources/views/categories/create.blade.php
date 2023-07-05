<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creating Category | {{ config('app.name') }}</title>
</head>
<body>
<x-header></x-header>
<h2>Creating new Category</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('categories.store') }}" name="form">
    @csrf
    <input type="text" placeholder="category name" name="name">
    <input type="submit" value="create">
</form>

</body>
</html>
