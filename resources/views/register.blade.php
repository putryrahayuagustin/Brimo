<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | MyApp</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Konfigurasi Tailwind CSS -->
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
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-green-400 via-blue-500 to-purple-600">
    <div class="bg-white shadow-xl rounded-lg p-8 w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo.png') }}" class="w-24" alt="Logo" class="rounded-full shadow-lg">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Create Your Account</h2>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register.form') }}">
            @csrf
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required autofocus>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary hover:bg-indigo-600 text-white font-bold py-2 rounded-lg transition duration-300">
                Sign Up
            </button>
        </form>

        <!-- Link to Login -->
        <div class="text-center mt-6">
            <p class="text-gray-600">Already have an account? 
                <a href="{{ route('login') }}" class="text-primary hover:underline">Sign In</a>
            </p>
        </div>
    </div>
</body>
</html>
