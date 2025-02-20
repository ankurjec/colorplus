{{-- <x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          {{ __("You're logged in!") }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
    <link rel="stylesheet" href="{{ asset('js/app.js') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <style>
        .chart-container {
            width: 300px;
            margin-right: 10px;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            /* Add the desired left offset */
            left: -60px;
        }
    </style>
</head>
{{-- //@include('components/Loader') --}}

<body class="bg-gray-100">
    <div class="flex h-screen">


        @include('partials/sidebar')


        <!-- Main Content -->
        <main class="flex-1">

            @include('partials/header')

            <div class="flex-1 p-8">

                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    {{-- <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Users
          </h2> --}}

                    <nav>
                        <ol class="flex items-center gap-2">
                            <li><a class="font-medium" href="/admin/dashboard">Dashboard /</a></li>

                        </ol>
                    </nav>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white rounded-lg shadow p-6">
                        <i class="fas fa-users mr-2"></i>
                        <h2 class="text-xl font-semibold mb-4">Total Users</h2>
                        <p class="text-3xl font-bold">1,234</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <i class="fas fa-rupee-sign mr-2"></i>

                        <h2 class="text-xl font-semibold mb-4">Revenue</h2>
                        <p class="text-3xl font-bold">$50,000</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6">
                        <i class="fas fa-shopping-cart mr-2"></i>

                        <h2 class="text-xl font-semibold mb-4">Orders</h2>
                        <p class="text-3xl font-bold">{{ $order_count }}</p>
                    </div>
                </div>

                <div class="flex mt-8">
                    <div class="bg-white rounded-lg shadow p-12 mr-12">
                        <h2 class="text-xl font-semibold mb-4">Visitors Analytics</h2>
                        <canvas id="visitorChart" width="400" height="200"></canvas>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 mr-12">
                        <h2 class="text-xl font-semibold mb-4">Total Revenue</h2>
                        <canvas id="revenueChart" width="400" height="200"></canvas>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <footer class="bg-gray-200 text-center py-4 mt-8">
        <p>&copy; 2023 Admin Dashboard. All rights reserved.</p>
    </footer>

    <script>
        // Chart.js code
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById("visitorChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                    datasets: [{
                        label: "Visitors",
                        data: [150, 220, 180, 300, 250, 400],
                        backgroundColor: "rgba(79, 209, 197, 0.3)",
                        borderColor: "rgba(79, 209, 197, 1)",
                        borderWidth: 2,
                        pointRadius: 0,
                    }, ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            // Sample data for total revenue
            const revenueData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Total Revenue',
                    data: [5000, 6000, 4500, 7000, 5500, 8000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };

            // Configuration options for the total revenue chart
            const revenueOptions = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };
            // Get the canvas element for the total revenue chart
            const revenueCanvas = document.getElementById('revenueChart');

            // Create the total revenue chart using Chart.js
            const revenueChart = new Chart(revenueCanvas, {
                type: 'bar',
                data: revenueData,
                options: revenueOptions
            });

            // Get the search input element
            const searchInput = document.querySelector('.search-input');

            // Get the user logo button element
            const userLogoButton = document.querySelector('.user-logo-button');

            // Get the dropdown menu element
            const dropdownMenu = document.querySelector('.dropdownOpen');

            // Event listener for search input
            searchInput.addEventListener('input', (event) => {
                const searchTerm = event.target.value;
                // Perform search or update search results here
                console.log('Search term:', searchTerm);
            });

            // Event listener for user logo button
            userLogoButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown menu when clicking outside
            window.addEventListener('click', (event) => {
                if (!userLogoButton.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

        });
    </script>
</body>

</html>