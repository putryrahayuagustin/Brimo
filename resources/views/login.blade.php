<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyApp</title>
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
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="bg-white shadow-xl rounded-lg p-8 w-full max-w-md">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/logo.png') }}" class="w-24" alt="Logo" class="rounded-full shadow-lg">
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Welcome Back!</h2>
        
        <!-- Flash message for status -->
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.form') }}">
            @csrf
            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required autofocus>
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-600">Remember Me</label>
                </div>
               
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary hover:bg-indigo-600 text-white font-bold py-2 rounded-lg transition duration-300">
                Sign In
            </button>
        </form>

        <!-- Link to Register -->
        <div class="text-center mt-6">
            <p class="text-gray-600">Don't have an account? 
                <a href="{{ route('register') }}" class="text-primary hover:underline">Sign Up</a>
            </p>
        </div>
    </div>
</body>
</html>
