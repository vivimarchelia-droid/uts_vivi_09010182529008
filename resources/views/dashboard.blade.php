<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Perpustakaan Vivi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a href="{{ route('dashboard') }}"
                   class="text-xl font-bold text-gray-800">
                    📚 Perpustakaan Vivi
                </a>

                <div class="flex items-center gap-4">

                    <span class="text-sm text-gray-600">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </nav>


        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 py-8">

            <!-- Header -->
            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-gray-600 mt-1">
                    Selamat datang di Sistem Informasi Perpustakaan Vivi.
                </p>

            </div>


            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


                <!-- Total Buku -->
                <div class="bg-white shadow rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Buku
                            </p>

                            <p class="text-3xl font-bold text-blue-600 mt-2">
                                {{ $totalBooks }}
                            </p>

                        </div>

                        <div class="text-4xl">
                            📚
                        </div>

                    </div>

                </div>


                <!-- Total Kategori -->
                <div class="bg-white shadow rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Kategori
                            </p>

                            <p class="text-3xl font-bold text-green-600 mt-2">
                                {{ $totalCategories }}
                            </p>

                        </div>

                        <div class="text-4xl">
                            🗂️
                        </div>

                    </div>

                </div>


                <!-- Total Stok -->
                <div class="bg-white shadow rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Stok
                            </p>

                            <p class="text-3xl font-bold text-purple-600 mt-2">
                                {{ $totalStock }}
                            </p>

                        </div>

                        <div class="text-4xl">
                            📦
                        </div>

                    </div>

                </div>

            </div>


            <!-- Buku Terbaru -->
            <div class="bg-white shadow rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">

                    <div>

                        <h3 class="text-xl font-bold text-gray-800">
                            Buku Terbaru
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Daftar buku yang terakhir ditambahkan.
                        </p>

                    </div>

                    <a
                        href="{{ route('books.index') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                        Kelola Buku

                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-gray-800 text-white">

                            <tr>

                                <th class="px-5 py-4">
                                    No
                                </th>

                                <th class="px-5 py-4">
                                    Judul
                                </th>

                                <th class="px-5 py-4">
                                    Kategori
                                </th>

                                <th class="px-5 py-4">
                                    Penulis
                                </th>

                                <th class="px-5 py-4">
                                    Tahun
                                </th>

                                <th class="px-5 py-4">
                                    Stok
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            @forelse($latestBooks as $book)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-5 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-semibold">
                                        {{ $book->title }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->category->name }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->author }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->year }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->stock }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="px-5 py-8 text-center text-gray-500">

                                        Belum ada data buku.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>