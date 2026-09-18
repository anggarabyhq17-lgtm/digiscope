const gridContainer = document.getElementById('dynamic-article-grid');
const searchInput = document.getElementById('searchInput');

let daftarArtikel = []; // Awalnya kosong, nanti diisi dari database MySQL
let kategoriAktif = 'Semua';
let keywordPencarian = '';

// 1. Ambil data artikel dari database MySQL lewat file PHP (ambil-data.php)
function ambilDataDariDatabase() {
    fetch('ambil-data.php')
        .then(response => response.json())
        .then(data => {
            daftarArtikel = data; // Masukkan data dari MySQL ke variabel
            tampilkanArtikel();  // Jalankan fungsi tampilkan setelah data didapat
        })
        .catch(error => console.error('Gagal memuat artikel:', error));
}

function tampilkanArtikel() {
    if (!gridContainer) return;
    
    gridContainer.innerHTML = '';

    let filteredArticles = daftarArtikel.filter(artikel => {
        let cocokKategori = (kategoriAktif === 'Semua' || artikel.kategori === kategoriAktif);
        let cocokKeyword = artikel.judul.toLowerCase().includes(keywordPencarian.toLowerCase());
        return cocokKategori && cocokKeyword;
    });

    if (filteredArticles.length === 0) {
        gridContainer.innerHTML = `
            <div class="col-span-full py-12 text-center text-gray-500 text-sm">
                Tidak ada artikel yang ditemukan.
            </div>
        `;
        return;
    }

    // Karena dari database ID sudah berurutan dari yang terbaru, kita tinggal looping biasa
    filteredArticles.forEach((artikel) => {
        // Perhatikan penggunaan artikel.id untuk menggantikan index array
        let cardHTML = `
            <div onclick="window.location.href='artikel.html?id=${artikel.id}'" class="bg-cardBg rounded-2xl border border-gray-800 overflow-hidden flex flex-col justify-between group cursor-pointer hover:border-accent/50 transition">
                <div>
                    <div class="h-48 overflow-hidden relative">
                        <img src="${artikel.gambar || 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=600&q=80'}" alt="Thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 opacity-90 group-hover:opacity-100">
                        <span class="absolute top-3 left-3 bg-darkBg/80 backdrop-blur-md text-accent text-[10px] font-bold px-2.5 py-1 rounded-md uppercase border border-gray-800">${artikel.kategori}</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-accent transition leading-snug">
                            ${artikel.judul}
                        </h3>
                        <p class="text-gray-400 text-xs sm:text-sm line-clamp-2">
                            ${artikel.isi}
                        </p>
                    </div>
                </div>
                <div class="px-6 pb-6 pt-0 flex items-center justify-between text-xs text-gray-500">
                    <span>Oleh: ${artikel.penulis || 'Admin'} • ${artikel.tanggal}</span>
                    <span class="text-accent font-semibold group-hover:translate-x-1 transition">&rarr;</span>
                </div>
            </div>
        `;
        gridContainer.insertAdjacentHTML('beforeend', cardHTML);
    });
}

function filterKategori(kategori) {
    kategoriAktif = kategori;

    document.querySelectorAll('.kategori-btn').forEach(btn => {
        if (btn.innerText.toLowerCase() === kategori.toLowerCase() || (kategori === 'Semua' && btn.innerText === 'Beranda')) {
            btn.className = "kategori-btn px-3 py-1.5 rounded-lg text-accent font-semibold transition cursor-pointer w-full text-left lg:w-auto";
        } else {
            btn.className = "kategori-btn px-3 py-1.5 rounded-lg text-gray-400 hover:text-white transition cursor-pointer w-full text-left lg:w-auto";
        }
    });

    tampilkanArtikel();
}

if (searchInput) {
    searchInput.addEventListener('input', (e) => {
        keywordPencarian = e.target.value;
        tampilkanArtikel();
    });
}

// Panggil fungsi untuk mengambil data dari database saat halaman pertama kali dibuka
ambilDataDariDatabase();