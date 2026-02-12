<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </x-slot>

        <div class="flex min-h-screen bg-gray-800">
            
            @include('components.dashboard-sidebar')

            <main class="flex-1 p-10">

                <!-- Welcome Card -->
                <div class="bg-white p-6 rounded-xl shadow mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        Welcome back! 
                    </h3>
                    <p class="text-gray-500 mt-1">
                        You are logged in successfully.
                    </p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-4  gap-6">

                 
                    <div class="flex items-center justify-between bg-green-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                Budget
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_price }} DH
                            </p>
                        </div>
                        <i class="fa-solid fa-money-bill-wave text-6xl opacity-30"></i>
                    </div>

                    <!-- Products -->
                    <div class="flex items-center justify-between bg-red-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-box"></i>
                                Products
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_products }}
                            </p>
                        </div>
                        <i class="fa-solid fa-box text-6xl opacity-30"></i>
                    </div>

                    <!-- Categories -->
                    <div class="flex items-center justify-between bg-purple-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-tags"></i>
                                Categories
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_categories }}
                            </p>
                        </div>
                        <i class="fa-solid fa-tags text-6xl opacity-30"></i>
                    </div>

                    <!-- Users -->
                    <div class="flex items-center justify-between bg-blue-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-users"></i>
                                Users
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_users }}
                            </p>
                        </div>
                        <i class="fa-solid fa-users text-6xl opacity-30"></i>
                    </div>

                    <!-- Orders -->
                    <div class="flex items-center justify-between bg-indigo-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-shopping-cart"></i>
                                Orders
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_orders }}
                            </p>
                        </div>
                        <i class="fa-solid fa-shopping-cart text-6xl opacity-30"></i>
                    </div>

                 

                    <!-- Suppliers -->
                    <div class="flex items-center justify-between bg-orange-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-truck"></i>
                                Suppliers
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $total_suppliers }}
                            </p>
                        </div>
                        <i class="fa-solid fa-truck text-6xl opacity-30"></i>
                    </div>

                    <!-- Pending Orders -->
                    <div class="flex items-center justify-between bg-yellow-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-clock"></i>
                                Pending Orders
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $pending_orders }}
                            </p>
                        </div>
                        <i class="fa-solid fa-clock text-6xl opacity-30"></i>
                    </div>

                    <!-- Delivered Orders -->
                    <div class="flex items-center justify-between bg-teal-500 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-check-circle"></i>
                                Delivered Orders
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $delivered_orders }}
                            </p>
                        </div>
                        <i class="fa-solid fa-check-circle text-6xl opacity-30"></i>
                    </div>

                    <!-- Canceled Orders -->
                    <div class="flex items-center justify-between bg-red-600 text-white p-6 rounded-xl shadow-lg hover:scale-105 transition-transform duration-300">
                        <div>
                            <h4 class="text-lg flex items-center gap-2">
                                <i class="fa-solid fa-times-circle"></i>
                                Canceled Orders
                            </h4>
                            <p class="text-4xl font-bold mt-2">
                                {{ $canceled_orders }}
                            </p>
                        </div>
                        <i class="fa-solid fa-times-circle text-6xl opacity-30"></i>
                    </div>

                </div>

            </main>
        </div>
    </x-app-layout>

</body>

</html>