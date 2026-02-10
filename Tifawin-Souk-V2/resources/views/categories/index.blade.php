<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Test category</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Categories</h1>

        <!-- categorys Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col">
                <!-- category Image -->

                <!-- category Name -->
                <h2 class="text-xl font-bold mb-2">{{ $category->name }}</h2>

                <!-- category Description -->
                <p class="text-gray-600 mb-4 flex-1">{{ $category->description }}</p>

                <!-- category Price -->
                <div class="text-lg font-semibold mb-4">{{ $category->slug }}</div>

             
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
    </div>

</body>

</html>