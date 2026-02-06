<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test Product</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    @foreach($products as $product)
        <div class="bg-white rounded-xl shadow-2xl max-w-sm p-6">
            <!-- Product Image -->
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded-lg mb-4 w-full h-48 object-cover">

            <!-- Product Name -->
            <h2 class="text-2xl font-bold mb-2">{{ $product->id }}</h2>

            <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>

            <!-- Product Description -->
            <p class="text-gray-600 mb-4">{{ $product->description }}</p>

            <!-- Product Price -->
            <div class="text-xl font-semibold mb-4">$ {{ $product->price }}</div>
            <form action="{{ route('cartItem.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <label for="quantity">Qty:</label>
                <input type="number" name="quantity" min="1" value="1" class="w-16 px-2 py-1 bg-gray-100 border border-gray-300 rounded-md
            text-center font-semibold focus:outline-none focus:ring-1 focus:ring-indigo-500 transition mb-3">
                <br>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Add to Cart
                </button>
            </form>






        </div>
    @endforeach

</body>

</html>