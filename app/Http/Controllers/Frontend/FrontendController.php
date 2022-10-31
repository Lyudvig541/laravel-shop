<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status','0')->get();
        $categories = Category::where('status','0')->get();
        return view('frontend.index', compact('sliders','categories'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function categories()
    {
        $categories = Category::where('status','0')->get();
        return view('frontend.pages.categories', compact('categories'));
    }

    public function product($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();
        $categories = Category::where('status','0')->get();

        if($category){

            $products = $category->products()->get();
            return view('frontend.pages.products', compact('products','category', 'categories'));
        }else{
            return redirect()->back();
        }
    }

    public function products()
    {
        $categories = Category::where('status','0')->get();
        $products = Product::where('status','0')->get();
        return view('frontend.pages.products', compact('categories', 'products'));
    }
}
