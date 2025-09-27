<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuSubCategory;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Drinks Category
        $drinksCategory = MenuCategory::create(['name' => 'Drinks']);
        
        // Coffee Sub-categories
        $hotCoffee = MenuSubCategory::create([
            'menu_category_id' => $drinksCategory->id,
            'name' => 'Hot Coffee'
        ]);
        
        $coldCoffee = MenuSubCategory::create([
            'menu_category_id' => $drinksCategory->id,
            'name' => 'Cold Coffee'
        ]);
        
        // Tea Sub-categories
        $tea = MenuSubCategory::create([
            'menu_category_id' => $drinksCategory->id,
            'name' => 'Tea'
        ]);
        
        // Hot Coffee Items
        MenuItem::create([
            'menu_sub_category_id' => $hotCoffee->id,
            'name' => 'Espresso',
            'description' => 'Rich and bold espresso shot made from premium coffee beans',
            'price' => 2.50
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $hotCoffee->id,
            'name' => 'Cappuccino',
            'description' => 'Perfect blend of espresso with steamed milk and foam',
            'price' => 4.25
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $hotCoffee->id,
            'name' => 'Latte',
            'description' => 'Smooth espresso with steamed milk and light foam',
            'price' => 4.75
        ]);
        
        // Cold Coffee Items
        MenuItem::create([
            'menu_sub_category_id' => $coldCoffee->id,
            'name' => 'Iced Americano',
            'description' => 'Cold espresso with water over ice',
            'price' => 3.25
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $coldCoffee->id,
            'name' => 'Cold Brew',
            'description' => 'Smooth cold-brewed coffee served over ice',
            'price' => 3.75
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $coldCoffee->id,
            'name' => 'Iced Latte',
            'description' => 'Espresso with cold milk over ice',
            'price' => 4.50
        ]);
        
        // Tea Items
        MenuItem::create([
            'menu_sub_category_id' => $tea->id,
            'name' => 'Green Tea',
            'description' => 'Fresh and healthy green tea with antioxidants',
            'price' => 2.75
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $tea->id,
            'name' => 'Earl Grey',
            'description' => 'Classic bergamot flavored black tea',
            'price' => 2.75
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $tea->id,
            'name' => 'Masala Chai',
            'description' => 'Spiced Indian tea with aromatic herbs and spices',
            'price' => 3.25
        ]);
        
        // Food Category
        $foodCategory = MenuCategory::create(['name' => 'Food']);
        
        // Breakfast Sub-category
        $breakfast = MenuSubCategory::create([
            'menu_category_id' => $foodCategory->id,
            'name' => 'Breakfast'
        ]);
        
        // Pastries Sub-category
        $pastries = MenuSubCategory::create([
            'menu_category_id' => $foodCategory->id,
            'name' => 'Pastries'
        ]);
        
        // Breakfast Items
        MenuItem::create([
            'menu_sub_category_id' => $breakfast->id,
            'name' => 'Croissant',
            'description' => 'Buttery, flaky French pastry perfect for breakfast',
            'price' => 3.50
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $breakfast->id,
            'name' => 'Bagel with Cream Cheese',
            'description' => 'Fresh bagel served with cream cheese',
            'price' => 4.25
        ]);
        
        // Pastry Items
        MenuItem::create([
            'menu_sub_category_id' => $pastries->id,
            'name' => 'Chocolate Muffin',
            'description' => 'Rich chocolate muffin with chocolate chips',
            'price' => 3.75
        ]);
        
        MenuItem::create([
            'menu_sub_category_id' => $pastries->id,
            'name' => 'Blueberry Scone',
            'description' => 'Traditional scone with fresh blueberries',
            'price' => 3.25
        ]);
    }
}