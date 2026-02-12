<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\dahsboard;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $total_users = User::all()->count();
        $total_products = Product::all()->count();
        $total_categories = Category::all()->count();
        $total_orders = Order::all()->count();
        $total_price = Order::where('status' , 'delivered')->sum('total_price');
        $total_suppliers = Supplier::all()->count();
        $pending_orders = Order::where('status' , 'pending')->count();
        $delivered_orders = Order::where('status' , 'delivered')->count();
        $canceled_orders = Order::where('status' , 'canceled')->count();

        return view('admin.dashboard', compact(
            'total_users',
            'total_products',
            'total_categories',
            'total_orders',
            'total_price',
            'total_suppliers',
            'pending_orders',
            'delivered_orders',
            'canceled_orders'

        ));
    }

 
}
