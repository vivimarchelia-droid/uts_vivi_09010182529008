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

        <main class="max-w-7xl mx-auto px-6 py-8">

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

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-5 py-4">No</th>
                                <th class="px-5 py-4">Judul</th>
                                <th class="px-5 py-4">Kategori</th>
                                <th class="px-5 py-4">Penulis</th>
                                <th class="px-5 py-4">Penerbit</th>
                                <th class="px-5 py-4">Tahun</th>
                                <th class="px-5 py-4">Stok</th>
                                <th class="px-5 py-4">Aksi</th>
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