<div x-data="{ open: true }" class="flex flex-col w-64 bg-primary text-white transition-all duration-300 h-full" :class="{ '-ml-64': !open }">
    <!-- Logo dan Toggle -->
    <div class="flex items-center justify-between p-4 bg-primary-dark">
        <span class="text-lg font-semibold">MyApp</span>
        <button @click="open = !open" class="block lg:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 mt-4 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h2a2 2 0 012 2v10a2 2 0 002 2h8a2 2 0 002-2V9a2 2 0 012-2h2"></path>
            </svg>
            Dashboard
        </a>

        @if (Auth::user()->role === 'admin')
        <!-- CRUD Nasabah -->
        <a href="{{ route('nasabah.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.656-1.344 3-3 3s-3-1.344-3-3 1.344-3 3-3 3 1.344 3 3z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.25 12a5.75 5.75 0 10-11.5 0"></path>
            </svg>
            Kelola Nasabah
        </a>
        @endif
        
        <!-- CRUD Rekening -->
        <a href="{{ route('rekening.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14V9H5zM5 15h14v-2H5zM5 19h14v-2H5z"></path>
            </svg>
            Kelola Rekening
        </a>

        <a href="{{ route('transaksi.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-secondary hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11h14V9H5zM5 15h14v-2H5zM5 19h14v-2H5z"></path>
            </svg>
            Transaksi
        </a>


    <!-- Logout -->
    <div class="p-4">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2 text-gray-300 hover:bg-secondary hover:text-white transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6h12v12"></path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>
