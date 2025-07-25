<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MadCorp - Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 font-sans">

    {{-- Navbar --}}
    <nav class="bg-white border-b shadow-sm py-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-center space-x-8 font-medium">
            <a href="/" class="text-sky-500 hover:text-sky-700 transition">Beranda</a>
            <a href="/tentang" class="hover:text-sky-500">Tentang</a>
            <a href="/produk" class="hover:text-sky-500">Produk</a>
            <a href="/artikel" class="hover:text-sky-500">Artikel</a>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative bg-sky-500 text-white h-[70vh] flex items-center justify-center text-center px-4">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di {{ $perusahaan->nama }}</h1>
            <p class="text-lg">{{ $perusahaan->deskripsi }}</p>
        </div>
    </section>

    {{-- Tentang Perusahaan --}}
    <section class="py-16 bg-gray-50 px-4">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-center">
            <img src="/storage/hero.jpg" alt="Tentang MadCorp" class="rounded-lg shadow-md">
            <div>
                <h2 class="text-3xl font-bold text-sky-600 mb-4">Tentang Kami</h2>
                <p class="text-gray-700">{{ $perusahaan->deskripsi }}</p>
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-sky-600 mb-10">Produk Unggulan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($produk as $item)
                    <div class="bg-white border rounded-lg p-6 shadow hover:shadow-md transition">
                        <h3 class="text-xl font-semibold mb-2">{{ $item->name }}</h3>
                        <p class="text-gray-600 mb-2">{{ Str::limit($item->description, 60) }}</p>
                        <p class="text-sky-600 font-bold">Rp{{ number_format($item->price) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Artikel Terbaru --}}
    <section class="py-16 bg-gray-100 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-sky-600 mb-10">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($artikel as $a)
                    <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                        <h3 class="text-lg font-semibold text-sky-700 mb-2">{{ $a->title }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($a->content, 80) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-white border-t py-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} MadCorp. Seluruh Hak Cipta Dilindungi.
    </footer>

</body>
</html>
