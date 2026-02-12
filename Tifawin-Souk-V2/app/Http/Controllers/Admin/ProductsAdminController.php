<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.products.create', compact('categories', 'suppliers'));
    }

    public function show(Product $product)
    {
        return view('admin.products.show' , compact('product'));
    }

       public function edit(Product $product )
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
       return view('admin.products.edit' , compact('product' , 'categories' , 'suppliers'));
    }

        public function store(Request $request)
    {
        $data = $request->validate([
               'name' => 'required|string|min:3' ,
               'description' => 'nullable|string|min:5',
               'price' => 'required|numeric',
               'stock' => 'required|integer',
               'category_id' => 'required|exists:categories,id',
               'supplier_id' => 'required|exists:suppliers,id',
               'image' => 'nullable|url'
        ]);

        $reference =  'REF-' . uniqid() . rand(1000 ,9999);
        $data['reference'] = $reference ;

        Product::create($data);
        return redirect()->route('dashboard.products');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function update(Product $product , Request $request)
    {
         $data = $request->validate([
              'name' => 'required|string|min:3' ,
               'description' => 'nullable|string|min:5',
               'price' => 'required|numeric',
               'stock' => 'required|integer',
               'category_id' => 'required|exists:categories,id',
               'supplier_id' => 'required|exists:suppliers,id',
               'image' => 'nullable|url'
        ]);

        $reference =  'REF-' . uniqid() . rand(100 ,999);
        $data['reference'] = $reference ;

        $product->update($data);
        return redirect()->route('dashboard.products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products');
    }
}
