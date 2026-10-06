<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Kategori - Perpustakaan Vivi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <!-- Navbar -->
        <nav class="bg-white border-b border-gray-200">

            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

                <a
                    href="{{ route('dashboard') }}"
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


        <!-- Content -->
        <main class="max-w-4xl mx-auto px-6 py-8">

            <div class="mb-6">

                <a
                    href="{{ route('categories.index') }}"
                    class="text-blue-600 hover:underline">

                    ← Kembali ke Daftar Kategori

                </a>

                <h2 class="text-2xl font-bold text-gray-800 mt-4">
                    Detail Kategori
                </h2>

                <p class="text-gray-600 mt-1">
                    Informasi kategori dan daftar buku di dalamnya.
                </p>

            </div>


            <!-- Detail Kategori -->
            <div class="bg-white shadow rounded-lg overflow-hidden mb-6">

                <div class="bg-blue-600 px-6 py-5">

                    <h3 class="text-xl font-bold text-white">
                        {{ $category->name }}
                    </h3>

                    <p class="text-blue-100 mt-1">
                        {{ $category->description ?? 'Tidak ada deskripsi.' }}
                    </p>

                </div>


                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <p class="text-sm text-gray-500">
                                Nama Kategori
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $category->name }}
                            </p>

                        </div>


                        <div>

                            <p class="text-sm text-gray-500">
                                Jumlah Buku
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $category->books->count() }} buku
                            </p>

                        </div>


                        <div class="md:col-span-2">

                            <p class="text-sm text-gray-500">
                                Deskripsi
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $category->description ?? '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            <!-- Daftar Buku -->
            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200">

                    <h3 class="text-xl font-bold text-gray-800">
                        Buku dalam Kategori
                    </h3>

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

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-200">

                            @forelse($category->books as $book)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-5 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-semibold">
                                        {{ $book->title }}
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

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="6"
                                        class="px-5 py-8 text-center text-gray-500">

                                        Belum ada buku dalam kategori ini.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- Tombol -->
            <div class="flex justify-end gap-3 mt-6">

                <a
                    href="{{ route('categories.edit', $category) }}"
                    class="px-5 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">

                    Edit Kategori

                </a>

                <a
                    href="{{ route('categories.index') }}"
                    class="px-5 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">

                    Kembali

                </a>

            </div>

        </main>

    </div>

</body>

</html>