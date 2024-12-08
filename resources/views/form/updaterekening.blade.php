<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Rekening | MyApp</title>
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
    <div class="flex min-h-screen">

        @include('components.sidebar')

        <div class="flex-1 p-6">
            <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-700 mb-6">Update Rekening</h2>

                <!-- Form Edit Rekening -->
                <form action="{{ route('rekening.update', $rekening->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="no_telepon" class="block text-gray-700 font-semibold">No Telepon</label>
                        <input type="text" id="no_telepon" name="no_telepon" class="w-full mt-2 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" value="{{ old('no_telepon', $rekening->no_telepon) }}" required>
                        @error('no_telepon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   

                    <div class="mb-4">
                        <label for="saldo" class="block text-gray-700 font-semibold">Saldo</label>
                        <input type="number" id="saldo" name="saldo" class="w-full mt-2 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary" value="{{ old('saldo', $rekening->saldo) }}" required>
                        @error('saldo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('rekening.index') }}" class="text-gray-500 hover:text-gray-700">Kembali ke Daftar Rekening</a>
                        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-md hover:bg-indigo-600 focus:outline-none">Update Rekening</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
