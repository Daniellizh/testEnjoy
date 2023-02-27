<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        $users = User::get();

        return view('orders.index', compact('orders', 'users'));
    }
}
