<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\CategoryService;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected array $title = [
        'singular' => 'Item',
        'plural' => 'Items'
    ];

    public function index(ItemService $itemService)
    {
        $title = $this->title['plural'];
        $items = $itemService->getAll();

        return view('item.index', compact('title', 'items'));
    }

    public function create(CategoryService $categoryService)
    {
        $title = "{$this->title['singular']} Create";
        $categories = $categoryService->getAll();
        return view('item.create', compact('title', 'categories'));
    }

    public function store(Request $request, ItemService $itemService)
    {
        $itemService->create($request->all());
        return to_route('items.index');
    }

    public function edit(CategoryService $categoryService, Item $item)
    {
        $title = "{$this->title['singular']} Edit";
        $categories = $categoryService->getAll();
        return view('item.edit', compact('title', 'item', 'categories'));
    }

    public function update(Request $request, ItemService $itemService, Item $item)
    {
        $itemService->update($item, $request->all());
        return to_route('items.index');
    }

    public function delete(ItemService $itemService, Item $item)
    {
        $itemService->delete($item);
        return to_route('items.index');
    }
}
