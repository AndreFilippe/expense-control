<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected array $title = [
        'singular' => 'Category',
        'plural' => 'Categories'
    ];

    public function index(CategoryService $categoryService)
    {
        $title = $this->title['plural'];
        $categories = $categoryService->getAll();

        return view('category.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = "{$this->title['singular']} Create";
        return view('category.create', compact('title'));
    }

    public function store(Request $request, CategoryService $categoryService)
    {
        $categoryService->create($request->all());
        return to_route('categories.index');
    }

    public function edit(Category $category)
    {
        $title = "{$this->title['singular']} Edit";
        return view('category.edit', compact('title', 'category'));
    }

    public function update(Request $request, CategoryService $categoryService, Category $category)
    {
        $categoryService->update($category, $request->all());
        return to_route('categories.index');
    }

    public function delete(CategoryService $categoryService, Category $category)
    {
        $categoryService->delete($category);
        return to_route('categories.index');
    }
}
