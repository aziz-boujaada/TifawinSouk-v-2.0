<aside class="w-64 bg-gray-900 text-white p-6">

    <h1 class="text-2xl font-bold mb-10 flex items-center gap-2">

        <i class="fa-solid fa-store"></i>

        TifawinSouk

    </h1>



    <nav class="flex flex-col gap-4 w-[25%]">



        <a href="{{ route('dashboard') }}"

            class="flex items-center justify-around gap-6 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded transition">

            <i class="fa-solid fa-house"></i>

            Dashboard

        </a>



        <a href="{{route('dashboard.products')}}"

            class="flex items-center justify-around gap-6 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded transition">

            <i class="fa-solid fa-box"></i>

            Products

        </a>



        <a href=""

            class="flex items-center justify-around gap-6 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded transition">

            <i class="fa-solid fa-tags"></i>

            Categories

        </a>



        <a href=""

            class="flex items-center justify-around gap-6 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded transition">

            <i class="fa-solid fa-users"></i>

            Suppliers

        </a>

         <a href=""

            class="flex items-center justify-around gap-6 bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded transition">

            <i class="fa-solid fa-shopping-cart"></i>

            Orders

        </a>



    </nav>

</aside>