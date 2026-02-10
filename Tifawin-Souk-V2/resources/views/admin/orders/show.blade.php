<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Order Items Details</title>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-3xl bg-white rounded-2xl p-8 shadow-2xl">

            <h1 class="text-2xl font-bold mb-4">Order Items</h1>

            @if($order->products->count() > 0)
            <ul>
                @foreach ($order->products as $item)
                <li class="border-b py-2">
                    Name : {{ $item->name }}
                    Quantity: {{ $item->pivot->quantity }} -
                    Price: ${{ $item->pivot->unit_price }}
                </li>
                @endforeach
            </ul>
            @else
            <p>No items in this order.</p>
            @endif

        </div>
    </div>

</body>

</html>