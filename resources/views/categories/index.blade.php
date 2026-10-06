<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kategori - Perpustakaan Vivi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        {{-- Navbar --}}
        <x-library-navbar />

        {{-- Content --}}
        <main class="max-w-7xl mx-auto px-6 py-8">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Kategori
                    </h2>

                    <p class="text-gray-600 mt-1">
                        Kelola kategori buku perpustakaan.
                    </p>
                </div>

                <a
                    href="{{ route('categories.create') }}"
                    class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">

                    + Tambah Kategori

                </a>

            </div>

            {{-- Success Message --}}
            @if(session('success'))

                <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-5">

                    {{ session('success') }}

                </div>

            @endif

            {{-- Table --}}
            <div class="bg-white shadow rounded-lg overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-gray-800 text-white">

                            <tr>

                                <th class="px-5 py-4">
                                    No
                                </th>

                                <th class="px-5 py-4">
                                    Nama Kategori
                                </th>

                                <th class="px-5 py-4">
                                    Deskripsi
                                </th>

                                <th class="px-5 py-4">
                                    Jumlah Buku
                                </th>

                                <th class="px-5 py-4">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-200">

                            @forelse($categories as $category)

                                <tr class="hover:bg-gray-50">

                                    <td class="px-5 py-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="px-5 py-4 font-semibold">
                                        {{ $category->name }}
                                    </td>

                                    <td class="px-5 py-4">
                                        {{ $category->description ?? '-' }}
                                    </td>

                                    <td class="px-5 py-4">

                                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                            {{ $category->books_count }} buku

                                        </span>

                                    </td>

                                    <td class="px-5 py-4">

                                        <div class="flex gap-3">

                                            <a
                                                href="{{ route('categories.show', $category) }}"
                                                class="text-blue-600 hover:underline">

                                                Detail

                                            </a>

                                            <a
                                                href="{{ route('categories.edit', $category) }}"
                                                class="text-yellow-600 hover:underline">

                                                Edit

                                            </a>

                                            <form
                                                method="POST"
                                                action="{{ route('categories.destroy', $category) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">

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
                                        colspan="5"
                                        class="px-5 py-8 text-center text-gray-500">

                                        Belum ada kategori.

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