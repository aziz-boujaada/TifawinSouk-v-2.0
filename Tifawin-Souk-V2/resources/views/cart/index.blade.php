<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    
    <div class="container mx-auto p-4">

        <table class="min-w-full bg-white border border-gray-200 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">USER</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2 px-4 border-b">{{ $cart->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $cart->user->name }}</td>
                </tr>
            </tbody>
        </table>
    
        <form action="{{ route('save-order-items') }}" method="post">
            @csrf
    
            <table class="min-w-full bg-white border border-gray-200 mb-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">Cart ID</th>
                        <th class="py-2 px-4 border-b">Product ID</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Product Name</th>
                        <th class="py-2 px-4 border-b">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cart->items as $cartItem)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $cartItem->cart_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $cartItem->product_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $cartItem->quantity }}</td>
                            <td class="py-2 px-4 border-b">{{ $cartItem->product->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $cartItem->product->price }}</td>
                        </tr>
    
                   
                        <input type="hidden" name="items[{{ $loop->index }}][product_id]" value="{{ $cartItem->product_id }}">
                        <input type="hidden" name="items[{{ $loop->index }}][quantity]" value="{{ $cartItem->quantity }}">
                        <input type="hidden" name="items[{{ $loop->index }}][unit_price]" value="{{ $cartItem->product->price }}">
                    @empty
                        <tr>
                            <td colspan="5" class="text-red-500 font-semibold py-2 px-4 text-center">
                                There is no product in the cart
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    
            @if($cart->items->count())
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Order
                </button>
            @endif
        </form>
    
   
        <div class="mt-4 space-x-4">
            <span class="font-semibold">Total Quantity:</span> <span>{{ $cart->totalQuantity() }}</span>
            <span class="font-semibold">Total Price:</span> <span>{{ $cart->totalPrice() }}</span>
        </div>
    
    </div>
</body>
</html>
