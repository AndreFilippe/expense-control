<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <a href="{{route('items.create')}}">New</a>
    <br>
    <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $index => $item)
          <tr>
            <th>{{++$index}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->description}}</td>
            <td>
                <a href="{{route('items.edit',['item' => $item->id])}}">Edit</a>
                <form action="{{route('items.delete',['item' => $item->id])}}" method="post">
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
