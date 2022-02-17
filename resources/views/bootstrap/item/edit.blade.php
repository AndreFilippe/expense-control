<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <form action="{{route('items.update',['item'=> $item->id])}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{$item->name}}" required>
        <br>
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <option value="">select</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @selected($category->id === $item->category_id)>{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" rows="5">{{$item->description}}</textarea>
        <br>
        <a href="{{route('items.index')}}">Back</a>
        <button type="submit">Save</button>
    </form>
</body>
</html>
