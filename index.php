<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiscope - Dark & Modern Publishing</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        darkBg: '#080C14',    
                        cardBg: '#111827',    
                        accent: {
                            DEFAULT: '#FF5722', 
                            hover: '#FF7043'
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-darkBg text-gray-200 antialiased selection:bg-accent selection:text-white">

    <!-- NAVBAR UTAMA -->
    <header class="border-b border-gray-800 sticky top-0 bg-darkBg/95 backdrop-blur-md z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="index.php" class="text-xl font-extrabold tracking-tight text-white">Digi<span class="text-accent">scope</span>.</a>
            <div class="flex items-center space-x-3">
                <a href="admin.html" class="bg-accent/10 hover:bg-accent text-accent hover:text-white border border-accent/20 text-xs font-bold px-3 py-2 rounded-xl transition flex items-center gap-1.5">
                    <span>+</span> <span>Panel Admin</span>
                </a>
            </div>
        </div>
    </header>

    <!-- NAVIGASI KATEGORI & PENCARIAN (STICKY) -->
    <div class="sticky top-16 bg-darkBg/95 backdrop-blur-md border-b border-gray-800 py-3 z-40 transition-all">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row md:items-center justify-between gap-3">
            
            <!-- KATEGORI UTAMA & DROPDOWN LAINNYA (Dibuat smooth scroll di HP) -->
            <div class="flex items-center space-x-1.5 overflow-x-auto no-scrollbar pb-1 md:pb-0 relative w-full md:w-auto">
                <button onclick="filterKategori('Semua')" class="kategori-btn px-3 py-1.5 rounded-lg text-accent font-semibold transition cursor-pointer whitespace-nowrap text-xs shrink-0">Terkini</button>
                <button onclick="filterKategori('News')" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0">News</button>
                <button onclick="filterKategori('Daerah')" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0">Daerah</button>
                <button onclick="filterKategori('Tech')" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0">Tech</button>
                <button onclick="filterKategori('Business')" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0">Business</button>
                <button onclick="filterKategori('Sport')" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0">Sport</button>

                <!-- TOMBOL DROPDOWN "LAINNYA" -->
                <div class="relative inline-block text-left shrink-0">
                    <button id="dropdownBtn" onclick="toggleDropdown(event)" class="kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs flex items-center space-x-1">
                        <span id="dropdownLabel">Lainnya</span>
                        <svg class="w-3 h-3 transition-transform duration-200" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div id="dropdownMenu" class="hidden absolute left-0 md:left-auto md:right-0 mt-2 w-44 bg-cardBg border border-gray-800 rounded-xl shadow-2xl py-2 z-50">
                        <button onclick="filterKategoriDropdown('Entertainment')" class="dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition">Entertainment</button>
                        <button onclick="filterKategoriDropdown('Lifestyle')" class="dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition">Lifestyle</button>
                        <button onclick="filterKategoriDropdown('Culture')" class="dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition">Culture</button>
                        <button onclick="filterKategoriDropdown('Travel')" class="dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition">Travel</button>
                        <button onclick="filterKategoriDropdown('Otomotif')" class="dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition">Otomotif</button>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="relative w-full md:w-64 shrink-0">
                <input type="text" id="searchInput" placeholder="Cari artikel..." class="w-full bg-cardBg border border-gray-800 rounded-xl px-4 py-2 text-xs text-white placeholder-gray-500 focus:outline-none focus:border-accent">
            </div>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6 space-y-8">
        
        <!-- BAGIAN HERO / UTAMA HARI INI -->
        <section id="heroSection">
            <!-- Diisi otomatis oleh JS -->
        </section>

        <!-- GRID ARTIKEL LAINNYA -->
        <section>
            <h2 class="text-base sm:text-lg font-bold text-white mb-5">Artikel Terbaru</h2>
            <div id="dynamic-article-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                <!-- Artikel grid muncul di sini -->
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="max-w-6xl mx-auto px-4 sm:px-6 py-8 text-center text-gray-600 text-xs border-t border-gray-800 mt-16">
        <p>&copy; 2026 Digiscope. Dark & Modern Publishing.</p>
    </footer>

    <!-- SCRIPT BERANDA -->
    <script>
        const gridContainer = document.getElementById('dynamic-article-grid');
        const heroSection = document.getElementById('heroSection');
        const searchInput = document.getElementById('searchInput');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownArrow = document.getElementById('dropdownArrow');
        const dropdownLabel = document.getElementById('dropdownLabel');

        let daftarArtikel = [];

// Ambil data langsung dari MySQL melalui file PHP
fetch('ambil-data.php')
    .then(response => response.json())
    .then(data => {
        daftarArtikel = data;
        tampilkanHalaman(); // Jalankan tampilan setelah data dari MySQL berhasil ditarik
    })
    .catch(error => {
        console.error('Gagal mengambil data dari database:', error);
    });
        let kategoriAktif = 'Semua';
        let keywordPencarian = '';

        function toggleDropdown(event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
            dropdownArrow.classList.toggle('rotate-180');
        }

        window.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target) && !document.getElementById('dropdownBtn').contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
            }
        });

        function tampilkanHalaman() {
            if (!gridContainer || !heroSection) return;

            let filteredArticles = daftarArtikel.filter(artikel => {
                let cocokKategori = (kategoriAktif === 'Semua' || artikel.kategori === kategoriAktif);
                let cocokKeyword = artikel.judul.toLowerCase().includes(keywordPencarian.toLowerCase());
                return cocokKategori && cocokKeyword;
            });

            // 1. RENDER HERO SECTION
            if (kategoriAktif === 'Semua' && keywordPencarian === '' && daftarArtikel.length > 0) {
                const artikelUtama = daftarArtikel[daftarArtikel.length - 1]; 
                const indexUtama = daftarArtikel.length - 1;
                let teksBersih = artikelUtama.isi.replace(/<\/?[^>]+(>|$)/g, "");

                const linkArtikel = `${window.location.origin}/artikel.php?id=${indexUtama}`;
                const shareWaUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(artikelUtama.judul)}%20-%20${encodeURIComponent(linkArtikel)}`;

                heroSection.innerHTML = `
                    <div class="mb-3 flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-gray-400">Utama Hari Ini</span>
                        <span class="text-[10px] bg-accent/10 text-accent border border-accent/20 px-2.5 py-1 rounded-md font-bold uppercase">Trending</span>
                    </div>
                    <div class="bg-cardBg rounded-2xl border border-gray-800 overflow-hidden grid grid-cols-1 md:grid-cols-12 group hover:border-accent/50 transition">
                        <div class="md:col-span-5 h-48 sm:h-60 md:h-full min-h-[180px] overflow-hidden relative cursor-pointer" onclick="window.location.href='artikel.php?id=${indexUtama}'">
                            <img src="${artikelUtama.gambar || 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=800&q=80'}" alt="Hero Image" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90 group-hover:opacity-100">
                            <span class="absolute top-3 left-3 bg-darkBg/80 backdrop-blur-md text-accent text-[10px] font-bold px-2.5 py-1 rounded-md uppercase border border-gray-800">${artikelUtama.kategori}</span>
                        </div>
                        <div class="md:col-span-7 p-5 sm:p-6 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center space-x-2 text-xs text-gray-500 mb-2">
                                    <span>Oleh: ${artikelUtama.penulis || 'Admin'}</span>
                                    <span>•</span>
                                    <span>${artikelUtama.tanggal}</span>
                                </div>
                                <h1 onclick="window.location.href='artikel.php?id=${indexUtama}'" class="text-base sm:text-xl font-extrabold text-white mb-2 group-hover:text-accent transition leading-snug cursor-pointer">
                                    ${artikelUtama.judul}
                                </h1>
                                <p onclick="window.location.href='artikel.php?id=${indexUtama}'" class="text-gray-400 text-xs sm:text-sm line-clamp-2 leading-relaxed cursor-pointer">
                                    ${teksBersih}
                                </p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-800 flex items-center justify-between text-xs">
                                <a href="artikel.php?id=${indexUtama}" class="font-bold text-accent flex items-center space-x-1">
                                    <span>Baca Selengkapnya</span>
                                    <span class="group-hover:translate-x-1 transition">&rarr;</span>
                                </a>
                                <div class="flex items-center space-x-2">
                                    <a href="${shareWaUrl}" target="_blank" title="Bagikan ke WhatsApp" class="p-2 bg-emerald-600/10 hover:bg-emerald-600 text-emerald-400 hover:text-white rounded-xl border border-emerald-500/20 transition flex items-center justify-center">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    </a>
                                    <button onclick="salinLinkLuar('${linkArtikel}', this)" title="Salin Tautan" class="p-2 bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white rounded-xl border border-gray-700 transition flex items-center justify-center cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                heroSection.innerHTML = ''; 
            }

            // 2. RENDER GRID ARTIKEL LAINNYA
            gridContainer.innerHTML = '';

            if (filteredArticles.length === 0) {
                gridContainer.innerHTML = `
                    <div class="col-span-full py-12 text-center text-gray-500 text-sm">
                        Tidak ada artikel yang ditemukan.
                    </div>
                `;
                return;
            }

            filteredArticles.slice().reverse().forEach((artikel) => {
                const actualIndex = daftarArtikel.indexOf(artikel);
                let teksBersihGrid = artikel.isi.replace(/<\/?[^>]+(>|$)/g, "");

                const linkArtikelGrid = `${window.location.origin}/artikel.php?id=${actualIndex}`;
                const shareWaGridUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(artikel.judul)}%20-%20${encodeURIComponent(linkArtikelGrid)}`;

                let cardHTML = `
                    <div class="bg-cardBg rounded-2xl border border-gray-800 overflow-hidden flex flex-col justify-between group hover:border-accent/50 transition">
                        <div>
                            <div class="h-44 sm:h-48 overflow-hidden relative cursor-pointer" onclick="window.location.href='artikel.php?id=${actualIndex}'">
                                <img src="${artikel.gambar || 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80'}" alt="Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90 group-hover:opacity-100">
                                <span class="absolute top-3 left-3 bg-darkBg/80 backdrop-blur-md text-accent text-[10px] font-bold px-2.5 py-1 rounded-md uppercase border border-gray-800">${artikel.kategori}</span>
                            </div>
                            <div class="p-4 sm:p-6">
                                <h3 onclick="window.location.href='artikel.php?id=${actualIndex}'" class="text-base sm:text-lg font-bold text-white mb-2 group-hover:text-accent transition leading-snug line-clamp-2 cursor-pointer">
                                    ${artikel.judul}
                                </h3>
                                <p onclick="window.location.href='artikel.php?id=${actualIndex}'" class="text-gray-400 text-xs sm:text-sm line-clamp-2 leading-relaxed cursor-pointer">
                                    ${teksBersihGrid}
                                </p>
                            </div>
                        </div>
                        <div class="px-4 sm:px-6 pb-4 sm:pb-6 pt-0 flex flex-col gap-3">
                            <div class="flex items-center justify-between text-xs text-gray-500 border-t border-gray-800/80 pt-3">
                                <span>Oleh: ${artikel.penulis || 'Admin'}</span>
                                <span>${artikel.tanggal}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <a href="artikel.php?id=${actualIndex}" class="text-accent font-bold text-xs flex items-center space-x-1 group-hover:translate-x-1 transition">
                                    <span>Baca</span>
                                    <span>&rarr;</span>
                                </a>
                                <div class="flex items-center space-x-2">
                                    <a href="${shareWaGridUrl}" target="_blank" title="Bagikan ke WhatsApp" class="p-1.5 bg-emerald-600/10 hover:bg-emerald-600 text-emerald-400 hover:text-white rounded-lg border border-emerald-500/20 transition flex items-center justify-center">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    </a>
                                    <button onclick="salinLinkLuar('${linkArtikelGrid}', this)" title="Salin Tautan" class="p-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white rounded-lg border border-gray-700 transition flex items-center justify-center cursor-pointer">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                gridContainer.insertAdjacentHTML('beforeend', cardHTML);
            });
        }

        function filterKategori(kategori) {
            kategoriAktif = kategori;
            dropdownLabel.innerText = "Lainnya";
            document.getElementById('dropdownBtn').className = "kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs flex items-center space-x-1";

            document.querySelectorAll('.kategori-btn').forEach(btn => {
                if(btn.id === 'dropdownBtn') return;
                if (btn.innerText.toLowerCase() === kategori.toLowerCase() || (kategori === 'Semua' && btn.innerText === 'Terkini')) {
                    btn.className = "kategori-btn px-3 py-1.5 rounded-lg text-accent font-semibold transition cursor-pointer whitespace-nowrap text-xs shrink-0";
                } else {
                    btn.className = "kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0";
                }
            });

            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.className = "dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-white hover:bg-gray-800/60 transition";
            });

        }

        function filterKategoriDropdown(kategori) {
            kategoriAktif = kategori;
            dropdownMenu.classList.add('hidden');
            dropdownArrow.classList.remove('rotate-180');

            dropdownLabel.innerText = kategori;
            document.getElementById('dropdownBtn').className = "kategori-btn px-3 py-1.5 rounded-lg text-accent font-semibold transition cursor-pointer whitespace-nowrap text-xs flex items-center space-x-1 shrink-0";

            document.querySelectorAll('.kategori-btn').forEach(btn => {
                if (btn.id !== 'dropdownBtn') {
                    btn.className = "kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer whitespace-nowrap text-xs shrink-0";
                }
            });

            document.querySelectorAll('.dropdown-item').forEach(item => {
                if (item.innerText.toLowerCase() === kategori.toLowerCase()) {
                    item.className = "dropdown-item w-full text-left px-4 py-2 text-xs text-accent font-semibold bg-gray-800/80 transition";
                } else {
                    item.className = "dropdown-item w-full text-left px-4 py-2 text-xs text-gray-400 hover:text-gray-200 hover:bg-gray-800/60 transition";
                }
            });

            tampilkanHalaman();
        }

        function salinLinkLuar(url, element) {
            navigator.clipboard.writeText(url).then(() => {
                element.classList.add("border-accent", "text-accent");
                setTimeout(() => {
                    element.classList.remove("border-accent", "text-accent");
                }, 1500);
            });
        }

        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                keywordPencarian = e.target.value;
                tampilkanHalaman();
            });
        }

        tampilkanHalaman();
    </script>
</body>
</html>