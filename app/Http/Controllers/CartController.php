<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::find($productId);
        $cart = new Cart;
        $cart->product_id = $product->id;
        $cart->user_id = Auth::id();
        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->back()->with('status', 'Add to cart!');
    }

    public function placeOrder()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if($product->amount <= 0){
                return redirect()->back()->with('status', "Sorry, but this product isn't enough!");
            }else{
                $product->amount -= $item->quantity;
                $product->save();
            $item->delete();
            return view('cart.order-success');
            }   
        }
        
        
    }
}
