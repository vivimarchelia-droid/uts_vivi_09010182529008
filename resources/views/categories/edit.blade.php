<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Kategori - Perpustakaan Vivi</title>

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
        <main class="max-w-3xl mx-auto px-6 py-8">

            <div class="mb-6">

                <a
                    href="{{ route('categories.index') }}"
                    class="text-blue-600 hover:underline">

                    ← Kembali ke Daftar Kategori

                </a>

                <h2 class="text-2xl font-bold text-gray-800 mt-4">
                    Edit Kategori
                </h2>

                <p class="text-gray-600 mt-1">
                    Perbarui informasi kategori yang dipilih.
                </p>

            </div>


            <!-- Error -->
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
                    action="{{ route('categories.update', $category) }}">

                    @csrf
                    @method('PUT')


                    <!-- Nama Kategori -->
                    <div class="mb-5">

                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Nama Kategori

                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name', $category->name) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            required>

                    </div>


                    <!-- Deskripsi -->
                    <div class="mb-6">

                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-700 mb-2">

                            Deskripsi

                        </label>

                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan deskripsi kategori">{{ old('description', $category->description) }}</textarea>

                    </div>


                    <!-- Tombol -->
                    <div class="flex justify-end gap-3">

                        <a
                            href="{{ route('categories.index') }}"
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