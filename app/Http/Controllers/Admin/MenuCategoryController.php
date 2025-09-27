<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view menu-categories', ['only' => ['index']]);
        $this->middleware('permission:create menu-categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit menu-categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete menu-categories', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = MenuCategory::withCount('subCategories')->get();
        return view('admin.menu-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.menu-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        MenuCategory::create($validated);
        return redirect()->route('admin.menu-categories.index')->with('status', 'Category created');
    }

    public function edit(MenuCategory $menuCategory)
    {
        return view('admin.menu-categories.edit', compact('menuCategory'));
    }

    public function update(Request $request, MenuCategory $menuCategory)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $menuCategory->update($validated);
        return redirect()->route('admin.menu-categories.index')->with('status', 'Category updated');
    }

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
        return back()->with('status', 'Category deleted');
    }
}