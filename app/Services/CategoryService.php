<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function __construct(private Category $model)
    {
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create(array $data): Category
    {
        return $this->model->create($data);
    }

    public function update(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }
}
