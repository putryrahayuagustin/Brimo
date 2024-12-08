<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekening | MyApp</title>
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
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Tambah Rekening</h2>

                <!-- Form Add Rekening -->
                <form action="{{ route('rekening.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="no_telepon" class="block text-gray-700">No Telepon</label>
                        <input type="text" id="no_telepon" name="no_telepon" class="w-full mt-2 p-3 border rounded-md" placeholder="Masukkan Nomor Rekening" required>
                    </div>

                   

                    <div class="mb-4">
                        <label for="saldo" class="block text-gray-700">Saldo Awal</label>
                        <input type="number" id="saldo" name="saldo" class="w-full mt-2 p-3 border rounded-md" placeholder="Masukkan Saldo Awal" required>
                    </div>

              

                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md">Tambah Rekening</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
