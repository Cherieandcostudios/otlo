<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuSubCategory;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view menu-items', ['only' => ['index']]);
        $this->middleware('permission:create menu-items', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit menu-items', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete menu-items', ['only' => ['destroy']]);
    }
    public function index()
    {
        $menuItems = MenuItem::with('subCategory.category')->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    public function create()
    {
        $subCategories = MenuSubCategory::with('category')->get();
        return view('admin.menu-items.create', compact('subCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menu_sub_category_id' => 'required|exists:menu_sub_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('menu-items', 'public');
        }

        MenuItem::create($validated);
        return redirect()->route('admin.menu-items.index')->with('status', 'Menu Item created');
    }

    public function edit(MenuItem $menuItem)
    {
        $subCategories = MenuSubCategory::with('category')->get();
        return view('admin.menu-items.edit', compact('menuItem', 'subCategories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'menu_sub_category_id' => 'required|exists:menu_sub_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('menu-items', 'public');
        }

        $menuItem->update($validated);
        return redirect()->route('admin.menu-items.index')->with('status', 'Menu Item updated');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return back()->with('status', 'Menu Item deleted');
    }
}