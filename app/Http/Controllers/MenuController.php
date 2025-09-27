<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::with(['subCategories.menuItems'])->get();
        return view('menu.index', compact('categories'));
    }

    public function show(MenuItem $menuItem)
    {
        $menuItem->load('subCategory.category');
        return view('menu.show', compact('menuItem'));
    }
}