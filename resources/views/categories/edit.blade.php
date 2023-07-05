<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editing Category | {{ config('app.name') }}</title>
</head>
<body>
<h2>Editing Category</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('categories.update', array('category' => $category->id)) }}" name="form">
    @method('patch')
    @csrf
    <input type="text" name="name" value="{{ $category->name }}">
    <input type="submit" value="edit">
</form>

</body>
</html>
