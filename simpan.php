<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penulis  = $_POST['penulis'];
    $gambar   = $_POST['gambar']; // Data gambar berupa Base64
    $isi      = $_POST['isi'];
    $tanggal  = date('j M Y'); // Contoh: 18 Sep 2026

    $query = "INSERT INTO artikel (judul, kategori, penulis, gambar, isi, tanggal) 
              VALUES ('$judul', '$kategori', '$penulis', '$gambar', '$isi', '$tanggal')";

    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "pesan" => "Artikel berhasil disimpan!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => mysqli_error($koneksi)]);
    }
}
?>