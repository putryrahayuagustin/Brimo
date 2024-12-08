<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Nasabah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    

<div class="max-w-2xl mx-auto p-6 bg-white border rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Nasabah</h2>

    <form action="{{ route('nasabah.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" class="w-full mt-2 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ old('nama') }}" required>
            @error('nama')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

  

        <div class="mb-4">
            <label for="no_hp" class="block text-gray-700">Telepon</label>
            <input type="text" id="no_hp" name="no_hp" class="w-full mt-2 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ old('no_hp') }}" required>
            @error('no_hp')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" class="w-full mt-2 p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" rows="4" required>{{ old('alamat') }}</textarea>
            @error('alamat')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Tambah Nasabah</button>
        </div>
    </form>
</div>


</body>
</html>