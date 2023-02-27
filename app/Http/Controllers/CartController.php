<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

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

        if($cart->quantity = $request->quantity <= 20){
        $cart->quantity = $request->quantity;
        }else{
            return redirect()->back()->with('status', 'Sorry, but you can not add to cart more!');
        }

        $cart->save();
        return redirect()->back()->with('status', 'Add to cart!');
    }

    public function placeOrder(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
            
        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if($product->amount <= 0){
                return redirect()->back()->with('status', "Sorry, but this product isn't enough!");
            }else{
                $product->amount -= $item->quantity;

                Order::create([
                    'user_id' => Auth::id(),
                    'product_id' =>  $item->product_id = $product->id,
                    'price' => $product['price'] * $item['quantity'],
                    'amount' => $item['quantity'],
                    'postName' => $request->postName,
                    'postOffice' => $request->postOffice,
                    'postCity' => $request->postCity,
                    'postStreet' => $request->postStreet,
                    'postBuilder' => $request->postBuilder,
                ]);
                
                $product->save();
                $item->delete();
                return view('cart.order-success');
            }   
        }
        
    }

    public function destroyCart($id)
    {
        $cartItems = Cart::findOrFail($id);

        $cartItems->delete();

        return back()->with('status', 'Product delete!');
    }
}
