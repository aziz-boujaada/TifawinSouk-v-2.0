<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>order Details</title>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-3xl bg-white rounded-2xl p-8 shadow-2xl">

            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center border-b pb-4">
                order Details
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">

               
                <div class="space-y-3">
                    <p>
                        <span class="font-semibold text-gray-900">order Name:</span>
                        <span class="text-gray-600">{{ $order->name }}</span>
                    </p>

                    <p>
                        <span class="font-semibold text-gray-900">Description:</span>
                        <span class="text-gray-600">{{ $order->description ?? 'No description' }}</span>
                    </p>

                    <p>
                        <span class="font-semibold text-gray-900">Price:</span>
                        <span class="text-gray-600">${{ $order->price }}</span>
                    </p>

                    <p>
                        <span class="font-semibold text-gray-900">Stock:</span>
                        <span class="text-gray-600">{{ $order->stock }}</span>
                    </p>

                    <p>
                        <span class="font-semibold text-gray-900">Category:</span>
                        <span class="text-gray-600">{{ $order->category?->name ?? 'No Category' }}</span>
                    </p>
                </div>

              
                <div class="flex items-center justify-center">
                    <img src="{{ $order->image_path }}" alt="{{ $order->name }} image"
                        class="rounded-xl shadow-xl w-full object-cover max-h-80 hover:scale-105 transition-transform">
                </div>

                <div>
                    <label for="quantity">Quantity</label>
                    <input type="number">
                </div>

            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('orders.index') }}"
                    class="inline-block px-6 py-3 rounded-xl bg-gray-800 text-white hover:bg-gray-700 transition font-medium">
                     Order
                </a>
            </div>

        </div>
    </div>

</body>

</html>
