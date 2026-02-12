<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>


    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg bg-white p-6 rounded-xl shadow-lg">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Add Prouduct
            </h2>

            <form action="{{route('dashboard.products.store')}}" method="POST" class="space-y-4">
                @csrf



                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Product Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none"
                        placeholder="Product Name...">
                </div>


                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Description
                    </label>
                    <input
                        type="text"
                        name="description"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none"
                        placeholder="Product Description...">
                </div>


                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Price
                    </label>
                    <input
                        type="number"
                        name="price"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none"
                        placeholder="100 DH">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Stock
                    </label>
                    <input
                        type="number"
                        name="stock"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none"
                        placeholder="Product Stock">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Image URL
                    </label>
                    <input
                        type="url"
                        name="image"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none"
                        placeholder="image url ...">
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Category
                    </label>
                    <select name="category_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none">
                        <option value="">select category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                 <div>
                    <label class="block text-gray-700 font-medium mb-1">
                        Supplier
                    </label>
                    <select name="supplier_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-700 focus:outline-none">
                        <option value="">select supplier</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('dashboard.products') }}"
                        class="text-gray-600 hover:underline">
                         Back
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition">
                        Add Product
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>