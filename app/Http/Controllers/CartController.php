<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProduct;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('user.cart', compact('cartItems'));
    }

    public function add(AddProduct $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id'       => Auth::id(),
                'product_id'    => $product->id,
                'quantity'      => 1,
                'product_image' => $product->product_image,
                'product_name'  => $product->product_name,
                'product_price' => $product->product_price,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Cart updated!');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return back()->with('success', 'Cart cleared!');
    }
}
