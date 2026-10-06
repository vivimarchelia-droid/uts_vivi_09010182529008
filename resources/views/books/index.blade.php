<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Perpustakaan Vivi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        📚 Perpustakaan Vivi
                    </h1>
                </div>

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
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Buku
                    </h2>

                    <p class="text-gray-600 mt-1">
                        Kelola data buku perpustakaan.
                    </p>
                </div>

                <a
                    href="{{ route('books.create') }}"
                    class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">
                    + Tambah Buku
                </a>

            </div>


            <!-- Pesan sukses -->
            @if(session('success'))

                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">
                    {{ session('success') }}
                </div>

            @endif


            <!-- Search & Filter -->
            <div class="bg-white shadow rounded-lg p-5 mb-6">

                <form method="GET" action="{{ route('books.index') }}">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Search -->
                        <div class="md:col-span-2">

                            <label
                                for="search"
                                class="block text-sm font-medium text-gray-700 mb-2">
                                Cari Buku
                            </label>

                            <input
                                type="text"
                                id="search"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="Cari berdasarkan judul, penulis, atau penerbit..."
                                class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        <!-- Filter Kategori -->
                        <div>

                            <label
                                for="category_id"
                                class="block text-sm font-medium text-gray-700 mb-2">
                                Filter Kategori
                            </label>

                            <select
                                id="category_id"
                                name="category_id"
                                class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    Semua Kategori
                                </option>

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    <!-- Tombol -->
                    <div class="flex gap-3 mt-4">

                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                            🔍 Cari
                        </button>

                        <a
                            href="{{ route('books.index') }}"
                            class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">
                            Reset
                        </a>

                    </div>

                </form>

            </div>


            <!-- Tabel Buku -->
            <div class="bg-white shadow rounded-lg overflow-hidden">

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
                                    Penerbit
                                </th>

                                <th class="px-5 py-4">
                                    Tahun
                                </th>

                                <th class="px-5 py-4">
                                    Stok
                                </th>

                                <th class="px-5 py-4">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            @forelse($books as $book)

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
                                        {{ $book->publisher }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->year }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $book->stock }}
                                    </td>

                                    <td class="px-5 py-4">

                                        <div class="flex gap-2">

                                            <a
                                                href="{{ route('books.show', $book) }}"
                                                class="text-blue-600 hover:underline">
                                                Detail
                                            </a>

                                            <a
                                                href="{{ route('books.edit', $book) }}"
                                                class="text-yellow-600 hover:underline">
                                                Edit
                                            </a>

                                            <form
                                                method="POST"
                                                action="{{ route('books.destroy', $book) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus buku ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="text-red-600 hover:underline">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="px-5 py-8 text-center text-gray-500">

                                        Tidak ada data buku yang sesuai dengan pencarian.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- Jumlah hasil -->
            <div class="mt-4 text-sm text-gray-600">

                Menampilkan
                <span class="font-semibold">
                    {{ $books->count() }}
                </span>
                buku.

            </div>

        </main>

    </div>

</body>
</html>