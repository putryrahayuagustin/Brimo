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
            <!-- Check if rekening exists -->
            @if($rekening)
                <!-- If rekening exists -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">Rekening Nasabah</h2>
                    <div class="flex items-center space-x-6">
                        <div>
                            <!-- Displaying Rekening Data -->
                            <h3 class="text-xl font-semibold">Nomor Telepon: {{ $rekening->no_telepon }}</h3>
                          
                            <p class="text-gray-600">Saldo: Rp {{ number_format($rekening->saldo, 0, ',', '.') }}</p>
                            
                            <!-- Update and Delete Buttons -->
                            @if (Auth::user()->role === 'admin')
                            <div class="mt-4">
                                <a href="{{ route('rekening.edit', $rekening->id) }}" class="text-blue-600 hover:underline mr-4">Update Rekening</a>
                                @endif
                                <form action="{{ route('rekening.destroy', $rekening->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    @if (Auth::user()->role === 'admin')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus Rekening</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- If rekening does not exist -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h2 class="text-xl font-bold mb-4">Anda Belum Memiliki Rekening</h2>
                    <p class="text-gray-700">Silakan buat rekening terlebih dahulu untuk mengakses informasi rekening Anda.</p>
                    <a href="{{ route('addrekening.index') }}" class="hover:text-indigo-600 hover:underline">Buat Rekening</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
