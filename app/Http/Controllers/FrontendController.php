<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\MenuSubCategory;
use App\Models\MenuItem;

class FrontendController extends Controller
{
    public function index() 
    { 
        return view('frontend.home');
    }

    public function about()
    { 
         return view('frontend.about'); 
    }
    public function menu()
    {
        $categories = MenuCategory::with(['subCategories.menuItems'])->get();
        return view('frontend.menu', compact('categories')); 
    }
    public function contact()
    { 
        return view('frontend.contact'); 
    }
    public function blog()
    { 
        return view('frontend.blog'); 
    }
    public function caltureValue()
    { 
        return view('frontend.calture-value'); 
    }
    public function cart()
    { 
        return view('frontend.cart'); 
    }
    public function checkout()
    { 
        return view('frontend.checkout'); 
    }
    public function customerService()
    { 
        return view('frontend.customer-service'); 
    }
    public function faq()
    { 
        return view('frontend.faq'); 
    }
    public function feature()
    { 
        return view('frontend.feature'); 
    }
    public function feedback()
    { 
        return view('frontend.feedback'); 
    }
    public function forgotPassword()
    { 
        return view('frontend.forgot-password'); 
    }
    public function franchise()
    { 
        return view('frontend.franchise'); 
    }
    public function join()
    { 
        return view('frontend.join'); 
    }
    public function library()
    { 
        return view('frontend.library'); 
    }
    public function location()
    { 
        return view('frontend.location'); 
    }
    public function menuItem($id)
    {
        $menuItem = MenuItem::with('subCategory.category')->findOrFail($id);
        return view('frontend.menu_item', compact('menuItem')); 
    }
    public function menuImproved()
    { 
        return view('frontend.menu-improved'); 
    }
    public function menuItemImproved()
    { 
        return view('frontend.menu-item-improved'); 
    }
    public function otloPodcast()
    { 
        return view('frontend.otlo-podcast'); 
    }
    public function otloPoetry()
    { 
        return view('frontend.otlo-poetry'); 
    }
    public function otloShow()
    { 
        return view('frontend.otlo-show'); 
    }
    public function otloTrust()
    { 
        return view('frontend.otlo-trust'); 
    }
    public function ourCaffe()
    { 
        return view('frontend.our-caffe'); 
    }
    public function payment()
    { 
        return view('frontend.payment'); 
    }
    public function privacy()
    { 
        return view('frontend.privacy'); 
    }
    public function privateEvents()
    { 
        return view('frontend.private-events'); 
    }
    public function rewards()
    { 
        return view('frontend.rewards'); 
    }
    public function signin()
    { 
        return view('frontend.signin'); 
    }
    public function accessibility()
    { 
        return view('frontend.accessibility'); 
    }
}