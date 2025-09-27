<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\MenuSubCategory;
use Illuminate\Http\Request;

class MenuSubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view menu-sub-categories', ['only' => ['index']]);
        $this->middleware('permission:create menu-sub-categories', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit menu-sub-categories', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete menu-sub-categories', ['only' => ['destroy']]);
    }
    public function index()
    {
        $subCategories = MenuSubCategory::with('category')->withCount('menuItems')->get();
        return view('admin.menu-sub-categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = MenuCategory::all();
        return view('admin.menu-sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('subcategories', 'public');
        }

        MenuSubCategory::create($validated);
        return redirect()->route('admin.menu-sub-categories.index')->with('status', 'Sub Category created');
    }

    public function edit(MenuSubCategory $menuSubCategory)
    {
        $categories = MenuCategory::all();
        return view('admin.menu-sub-categories.edit', compact('menuSubCategory', 'categories'));
    }

    public function update(Request $request, MenuSubCategory $menuSubCategory)
    {
        $validated = $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('subcategories', 'public');
        }

        $menuSubCategory->update($validated);
        return redirect()->route('admin.menu-sub-categories.index')->with('status', 'Sub Category updated');
    }

    public function destroy(MenuSubCategory $menuSubCategory)
    {
        $menuSubCategory->delete();
        return back()->with('status', 'Sub Category deleted');
    }
}