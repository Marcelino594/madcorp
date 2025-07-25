<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>MadCorp - Home</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    target?.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Toggle Produk
            const toggleProduk = document.getElementById('toggleProduk');
            toggleProduk.addEventListener('click', () => {
                document.getElementById('produkWrapper').classList.remove('max-h-[700px]',
                    'overflow-hidden');
                toggleProduk.classList.add('hidden');
            });

            // Toggle Artikel
            const toggleArtikel = document.getElementById('toggleArtikel');
            toggleArtikel.addEventListener('click', () => {
                document.getElementById('artikelWrapper').classList.remove('max-h-[700px]',
                    'overflow-hidden');
                toggleArtikel.classList.add('hidden');
            });

            // Init Swiper
            new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 3000
                },
                pagination: {
                    el: '.swiper-pagination'
                },
            });
        });
    </script>
</head>

<body class="bg-white text-gray-800 font-sans scroll-smooth">

    {{-- Navbar --}}
    <nav class="bg-white border-b shadow-sm py-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center px-4">
            {{-- Logo dan Nama Brand --}}
            <div class="flex items-center space-x-3">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo MadCorp" class="w-10 h-10 object-contain">
                <span class="font-bold text-xl text-sky-600">MadCorp</span>
            </div>

            {{-- Navigasi Menu --}}
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="#beranda" class="text-sky-500 hover:text-sky-700 transition">Beranda</a>
                <a href="#tentang" class="hover:text-sky-500">Tentang</a>
                <a href="#produk" class="hover:text-sky-500">Produk</a>
                <a href="#artikel" class="hover:text-sky-500">Artikel</a>
            </div>
        </div>
    </nav>


    {{-- Hero Carousel --}}
    <section id="beranda" class="swiper w-full h-[70vh]">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="/storage/banner1.webp" class="w-full h-[70vh] object-cover" alt="Banner 1">
            </div>
            <div class="swiper-slide">
                <img src="/storage/banner2.webp" class="w-full h-[70vh] object-cover" alt="Banner 2">
            </div>
            <div class="swiper-slide">
                <img src="/storage/banner3.webp" class="w-full h-[70vh] object-cover" alt="Banner 2">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="py-8 px-4">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-center">
            <img src="/storage/logo.png" alt="logo MadCorp" class="shadow-md rounded">
            <div>
                <h2 class="text-3xl font-bold text-sky-600 mb-4">Tentang Kami</h2>
                <p class="text-gray-700">{{ $perusahaan->deskripsi }}</p>
            </div>
        </div>
    </section>

    {{-- Produk --}}
    <section id="produk" class="py-16 bg-gray-50 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-sky-600 mb-10">Produk</h2>
            <div id="produkWrapper" class="transition-all duration-500 max-h-[700px] overflow-hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($produk as $item)
                        <div class="bg-white rounded-lg shadow p-4">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                class="w-full h-40 object-cover rounded mb-3">
                            <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($item->description, 60) }}</p>
                            <p class="text-sky-600 font-semibold">Rp{{ number_format($item->price) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <button id="toggleProduk" class="mt-6 text-sky-600 hover:text-sky-800 underline">Lihat Selengkapnya</button>
        </div>
    </section>

    {{-- Artikel --}}
    <section id="artikel" class="py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-sky-600 mb-10">Artikel Terbaru</h2>
            <div id="artikelWrapper" class="transition-all duration-500 max-h-[700px] overflow-hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($artikel as $a)
                        <div class="bg-white rounded-lg shadow p-4">
                            @if ($a->image)
                                <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}"
                                    class="w-full h-40 object-cover rounded mb-3">
                            @endif
                            <h3 class="text-lg font-bold text-sky-700 mb-1">{{ $a->title }}</h3>
                            <p class="text-sm text-gray-600">{{ Str::limit($a->content, 80) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <button id="toggleArtikel" class="mt-6 text-sky-600 hover:text-sky-800 underline">Lihat
                Selengkapnya</button>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-white border-t py-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} MadCorp. Seluruh Hak Cipta Dilindungi.
    </footer>

</body>

</html>
