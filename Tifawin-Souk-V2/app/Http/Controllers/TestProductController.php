<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestProductController extends Controller
{
  public function index()
  {
    $products = Product::paginate(4);
    return view('test', compact('products'));
  }




}