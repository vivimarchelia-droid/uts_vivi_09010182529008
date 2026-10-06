<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Buku - Perpustakaan Vivi</title>

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

                    Detail Buku

                </h2>

                <p class="text-gray-600 mt-1">

                    Informasi lengkap mengenai buku.

                </p>

            </div>


            <!-- Detail Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="bg-blue-600 px-6 py-5">

                    <h3 class="text-xl font-bold text-white">

                        {{ $book->title }}

                    </h3>

                    <p class="text-blue-100 mt-1">

                        {{ $book->category->name }}

                    </p>

                </div>


                <div class="p-6">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <!-- Judul -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Judul Buku
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->title }}
                            </p>

                        </div>


                        <!-- Kategori -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Kategori
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->category->name }}
                            </p>

                        </div>


                        <!-- Penulis -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Penulis
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->author }}
                            </p>

                        </div>


                        <!-- Penerbit -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Penerbit
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->publisher }}
                            </p>

                        </div>


                        <!-- Tahun -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Tahun Terbit
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->year }}
                            </p>

                        </div>


                        <!-- Stok -->
                        <div>

                            <p class="text-sm text-gray-500">
                                Stok
                            </p>

                            <p class="font-semibold text-gray-800 mt-1">
                                {{ $book->stock }} buku
                            </p>

                        </div>

                    </div>


                    <!-- Tombol -->
                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ route('books.edit', $book) }}"
                            class="px-5 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">

                            Edit Buku

                        </a>

                        <a
                            href="{{ route('books.index') }}"
                            class="px-5 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>
</html>