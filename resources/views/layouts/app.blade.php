<!DOCTYPE html>
<html>

<head>
    <title>SPK Siswa Berprestasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-800 text-white py-4 mb-4">
        <div class="container mx-auto px-4">
            <a class="font-bold text-xl tracking-wide" href="/">SPK SAW</a>
        </div>
    </nav>
    <div class="container mx-auto px-4">
        <div class="flex">
            <aside class="w-64 bg-white rounded-lg shadow-md p-6 mr-8 min-h-[70vh]">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('penilaian.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition hover:bg-blue-100 {{ request()->routeIs('penilaian.*') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M9 17v-2a4 4 0 0 1 4-4h4" />
                                <path d="M17 17v-2a4 4 0 0 0-4-4H9" />
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                            Penilaian
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('siswa.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition hover:bg-blue-100 {{ request()->routeIs('siswa.*') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 20h5v-2a4 4 0 0 0-3-3.87" />
                                <path d="M9 20H4v-2a4 4 0 0 1 3-3.87" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Siswa
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kriteria.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition hover:bg-blue-100 {{ request()->routeIs('kriteria.*') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Kriteria
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('hasil.index') }}"
                            class="flex items-center px-3 py-2 rounded-lg transition hover:bg-blue-100 {{ request()->routeIs('hasil.*') ? 'bg-blue-500 text-white' : 'text-gray-700' }}">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M3 17v-6a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v6" />
                                <path d="M16 21v-4a4 4 0 0 0-8 0v4" />
                            </svg>
                            Hasil
                        </a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1 bg-white rounded-lg shadow-md p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>