<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" rows="5"></textarea>
        <br>
        <a href="{{route('categories.index')}}">Back</a>
        <button type="submit">Save</button>
    </form>
</body>
</html>
