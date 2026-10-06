<nav class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex justify-between items-center">

            <!-- Logo -->
            <a
                href="{{ route('dashboard') }}"
                class="text-xl font-bold text-gray-800">

                📚 Perpustakaan Vivi

            </a>


            <!-- Menu -->
            <div class="flex items-center gap-6">

                <!-- Dashboard -->
                <a
                    href="{{ route('dashboard') }}"
                    class="text-sm font-medium
                    {{ request()->routeIs('dashboard')
                        ? 'text-blue-600'
                        : 'text-gray-600 hover:text-blue-600' }}">

                    Dashboard

                </a>


                <!-- Buku -->
                <a
                    href="{{ route('books.index') }}"
                    class="text-sm font-medium
                    {{ request()->routeIs('books.*')
                        ? 'text-blue-600'
                        : 'text-gray-600 hover:text-blue-600' }}">

                    Buku

                </a>


                <!-- Kategori -->
                <a
                    href="{{ route('categories.index') }}"
                    class="text-sm font-medium
                    {{ request()->routeIs('categories.*')
                        ? 'text-blue-600'
                        : 'text-gray-600 hover:text-blue-600' }}">

                    Kategori

                </a>


                <!-- Nama User -->
                <span class="text-sm text-gray-600 border-l pl-6">

                    {{ auth()->user()->name }}

                </span>


                <!-- Logout -->
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

    </div>

</nav>