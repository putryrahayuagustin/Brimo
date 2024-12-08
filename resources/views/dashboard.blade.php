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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex">
        @include('components.sidebar')

        <div class="flex-1 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">USERS</h2>
                    <p class="text-gray-700 text-3xl">{{$users->count()}}</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">TOTAL SALDO</h2>
                    <p class="text-gray-700 text-3xl">{{$rekenings->sum('saldo')}}</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-2">PERFORMANCE</h2>
                    <p class="text-gray-700 text-3xl">88%</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="bg-white rounded-lg shadow-lg mt-8 p-6">
                <h3 class="text-2xl font-bold mb-4">Revenue Overview</h3>
                <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                    <p>Chart Placeholder</p>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-lg shadow-lg mt-8 p-6">
                <h3 class="text-2xl font-bold mb-4">Recent Transactions</h3>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Date</th>
                            <th class="py-2">Description</th>
                            <th class="py-2">Amount</th>
                            <th class="py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4">2024-11-01</td>
                            <td class="py-3 px-4">Payment Received</td>
                            <td class="py-3 px-4">$500</td>
                            <td class="py-3 px-4 text-green-500">Completed</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">2024-11-02</td>
                            <td class="py-3 px-4">New Subscription</td>
                            <td class="py-3 px-4">$199</td>
                            <td class="py-3 px-4 text-blue-500">Pending</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">2024-11-03</td>
                            <td class="py-3 px-4">Refund Processed</td>
                            <td class="py-3 px-4">-$100</td>
                            <td class="py-3 px-4 text-red-500">Refunded</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
