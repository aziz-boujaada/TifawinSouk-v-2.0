<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test Product</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Products</h1>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <!-- Product Image -->
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded-lg mb-4 w-full h-48 object-cover">

                <!-- Product Name -->
                <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>

                <!-- Product Description -->
                <p class="text-gray-600 mb-4 flex-1">{{ $product->description }}</p>

                <!-- Product Price -->
                <div class="text-lg font-semibold mb-4">$ {{ $product->price }}</div>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="post" class="flex flex-col items-center">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="unit_price" value="{{ $product->price }}">

                    <div class="flex items-center mb-3">
                        <label for="quantity" class="mr-2 font-semibold">Qty:</label>
                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            value="1"
                            class="w-16 px-2 py-1 bg-gray-100 border border-gray-300 rounded-md text-center font-semibold
                                focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
                    </div>

                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                        Add to Cart
                    </button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>

</body>

</html>