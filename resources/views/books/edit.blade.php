<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Buku - Perpustakaan Vivi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <h1 class="text-xl font-bold text-gray-800">
                    📚 Perpustakaan Vivi
                </h1>

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


        <!-- Content -->
        <main class="max-w-3xl mx-auto px-6 py-8">

            <div class="mb-6">

                <a
                    href="{{ route('books.index') }}"
                    class="text-blue-600 hover:underline">

                    ← Kembali ke Daftar Buku

                </a>

                <h2 class="text-2xl font-bold text-gray-800 mt-4">

                    Edit Buku

                </h2>

                <p class="text-gray-600 mt-1">

                    Perbarui informasi buku yang dipilih.

                </p>

            </div>


            <!-- Pesan Error -->
            @if ($errors->any())

                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-5">

                    <p class="font-semibold mb-2">
                        Terdapat kesalahan:
                    </p>

                    <ul class="list-disc list-inside">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- Form -->
            <div class="bg-white shadow rounded-lg p-6">

                <form
                    method="POST"
                    action="{{ route('books.update', $book) }}">

                    @csrf

                    @method('PUT')


                    <!-- Kategori -->
                    <div class="mb-5">

                        <label
                            for="category_id"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Kategori

                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            @foreach ($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- Judul -->
                    <div class="mb-5">

                        <label
                            for="title"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Judul Buku

                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title', $book->title) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Penulis -->
                    <div class="mb-5">

                        <label
                            for="author"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Penulis

                        </label>

                        <input
                            type="text"
                            name="author"
                            id="author"
                            value="{{ old('author', $book->author) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Penerbit -->
                    <div class="mb-5">

                        <label
                            for="publisher"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Penerbit

                        </label>

                        <input
                            type="text"
                            name="publisher"
                            id="publisher"
                            value="{{ old('publisher', $book->publisher) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Tahun -->
                    <div class="mb-5">

                        <label
                            for="year"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Tahun Terbit

                        </label>

                        <input
                            type="number"
                            name="year"
                            id="year"
                            value="{{ old('year', $book->year) }}"
                            min="1000"
                            max="9999"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Stok -->
                    <div class="mb-6">

                        <label
                            for="stock"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Stok

                        </label>

                        <input
                            type="number"
                            name="stock"
                            id="stock"
                            value="{{ old('stock', $book->stock) }}"
                            min="0"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Tombol -->
                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('books.index') }}"
                            class="px-5 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="px-5 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>

</body>

</html>