<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Orders</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">ID</th>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">USER</th>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">TOTAL PRICE</th>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">STATUS</th>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">ITEMS</th>
                        <th class="py-3 px-4 border-b text-left font-semibold text-gray-700">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->user->name }}</td>
                        <td class="py-2 px-4 border-b">$ {{ $order->total_price }}</td>
                        <td class="py-2 px-4 border-b">
                            <span class="px-2 py-1 rounded 
                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:underline">
                                Details
                            </a>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{route('edit-order' , $order)}}" 
                               class="bg-indigo-500 text-white px-3 py-1 rounded hover:bg-indigo-600 transition">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
         <div class="mt-6">
            {{ $orders->links() }}
        </div>
    </div>

</body>
</html>


