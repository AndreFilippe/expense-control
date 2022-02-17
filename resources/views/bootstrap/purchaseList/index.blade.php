@extends('template')
@section('title', $title)
@section('content')
    <form action="{{route('purchaseList.store')}}" method="post" class="row">
        @csrf
        <div class="col-4">
            <label class="form-label" for="item_id">Item:</label>
            <select name="item_id" class="form-select" required>
                <option value="">Select</option>
                @foreach ($items as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-2">
            <label class="form-label" for="quantity">Quantity:</label>
            <input class="form-control" type="number" name="quantity" min="0">
        </div>
        <div class="col-2">
            <label class="form-label" for="unit_measure">Unit measure:</label>
            <select name="unit_measure" class="form-select">
                <option value="">Any</option>
                <option value="unity">Unity</option>
                <option value="kilogram">Kilogram</option>
            </select>
        </div>
        <div class="col-12">
            <label for="description">Description:</label>
            <textarea name="description" rows="2" class="form-control"></textarea>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Description</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($purchaseList as $index => $item)
          <tr>
            <th scope="col">{{++$index}}</th>
            <td>{{$item->item->name}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->description}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('purchaseList.edit',['item' => $item->id])}}" class="btn btn-dark">Edit</a>
                    <form action="{{route('purchaseList.delete',['item' => $item->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
