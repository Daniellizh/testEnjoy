<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // $cartItems = Cart::where('user_id', Auth::id())->get();
        $user = User::get();
        $products = Product::get();
        $orders = Order::get();

        return view('orders.index', compact('orders'));
    }
}
