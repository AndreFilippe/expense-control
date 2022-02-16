<?php

namespace App\Services;

use App\Models\Item;

class ItemService
{
    public function __construct(private Item $model)
    {
    }

    public function getAll()
    {
        return $this->model->with('category')->orderBy('name', 'asc')->get();
    }

    public function create(array $data): Item
    {
        return $this->model->create($data);
    }

    public function update(Item $item, array $data)
    {
        return $item->update($data);
    }

    public function delete(Item $item)
    {
        return $item->delete();
    }
}
