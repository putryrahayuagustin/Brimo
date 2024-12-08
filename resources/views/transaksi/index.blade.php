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
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-4">List Transaksi</h2>
                <div class="flex items-center space-x-6"> 
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->user_id }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->user->name}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->tanggal_transaksi }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->jumlah_transaksi }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">{{ $transaksi->jenis_transaksi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $transaksis->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
