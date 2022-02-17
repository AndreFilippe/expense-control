<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <a href="{{route('categories.create')}}">New</a>
    <br>
    <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
          <tr>
            <th>{{++$index}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{route('categories.edit',['category' => $category->id])}}">Edit</a>
                <form action="{{route('categories.delete',['category' => $category->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
