<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MyApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#F59E0B',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex">
        @include('components.sidebar')

        <div class="flex-1 p-6">
            <!-- Check if nasabah exists -->
            @if($nasabah)
                <!-- If user is registered -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Profil Nasabah</h2>
                    <div class="flex items-center space-x-6">
                        <!-- Profile Picture -->
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" draggable="false" class="w-32 h-32 rounded-full">
                        <div>
                            <!-- Displaying Nasabah Data -->
                            <h3 class="text-xl font-semibold">{{ $nasabah->nama }}</h3>
                            <p class="text-gray-600">Nasabah ID: {{ $nasabah->id }}</p>
                            <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
                            <p class="text-gray-600">No Telepon: {{ $nasabah->no_hp }}</p>
                            <p class="text-gray-600">Status: {{ $nasabah->status ?? 'Aktif' }}</p>
                            
                            <!-- Update and Delete Buttons -->
                            <div class="mt-4">
                                <a href="{{ route('nasabah.edit', $nasabah->id) }}" class="text-blue-600 hover:underline mr-4">Update Profil</a>
                                
                                <form action="{{ route('nasabah.destroy', $nasabah->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus Profil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- If user is not registered -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h2 class="text-xl font-bold mb-4">Anda Belum Terdaftar</h2>
                    <p class="text-gray-700">Silakan mendaftar untuk mengakses profil Anda.</p>
                    <a href="{{ route('addnasabah.index') }}" class="hover:text-indigo-600 hover:underline">Daftar Nasabah</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
