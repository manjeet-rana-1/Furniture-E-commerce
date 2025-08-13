<?php

namespace App\Http\Controllers;
use App\Models\AddProduct;
use App\Models\Faqs;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function homePage(){
        $products = AddProduct::all();
        return view('user.home', compact('products'));
    }

    public function shop(){
        return view('user.shop');
    }
    public function about(){
        $faqs = Faqs::all();
        return view('user.about', compact('faqs'));
    }
     public function contact(){
     return view('user.contact');
     }
     public function services(){
    return view('user.services');
     }
     public function blog(){
     return view('user.blog');
     }
     public function cart(){
     return view('user.cart');
     }


     public function ExploreProducts(){
        $products = AddProduct::all();
        return view('user.explore_product', compact('products'));
     }
}
