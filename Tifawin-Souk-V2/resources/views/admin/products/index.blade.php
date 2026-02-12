<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Products Management</title>
</head>
<body class="bg-gray-100">

    <header class="bg-gray-900 text-white shadow-md fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500 text-white font-bold">
                    TS
                </div>
                <div>
                    <h1 class="text-xl font-semibold">Tifawin-Souk</h1>
                    <p class="text-sm text-gray-300">Product Management</p>
                </div>
            </div>
            <a href="{{ route('dashboard.products.create') }}" class="px-3 py-2 rounded-md bg-yellow-500 text-gray-900 hover:bg-yellow-400 transition">
                Add New Product
            </a>
        </div>
    </header>

    <div class="flex gap-6 pt-24 px-6">

        @include('components.dashboard-sidebar')

        <div class="flex-1">

           
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 text-white border border-gray-200 shadow-md rounded-lg">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Reference</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Stock</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Category</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-white uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-700">
                            <td class="px-6 py-4 text-sm text-white">{{ $product->reference }}</td>
                            <td class="px-6 py-4 text-sm text-white">{{ $product->name }}</td>
                            <td class="px-6 py-4 text-sm text-white">{{ $product->description }}</td>
                            <td class="px-6 py-4 text-sm text-white">{{ $product->price }}</td>
                            <td class="px-6 py-4 text-sm text-white">{{ $product->stock }}</td>
                            <td class="px-6 py-4 text-sm text-white">{{ $product->category?->name ?? 'No Category' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.products.show', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-white text-sm">View</a>
                                    <a href="{{ route('dashboard.products.edit', $product) }}" class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white text-sm">Edit</a>
                                    <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white text-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>

</body>
</html>