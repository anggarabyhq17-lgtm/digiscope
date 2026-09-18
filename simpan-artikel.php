<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul    = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $penulis  = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $gambar   = mysqli_real_escape_string($koneksi, $_POST['gambar']); // Bisa berupa URL gambar atau base64
    $isi      = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $tanggal  = date('d M Y'); // Format tanggal otomatis

    $query = "INSERT INTO artikel (judul, kategori, penulis, gambar, isi, tanggal) VALUES ('$judul', '$kategori', '$penulis', '$gambar', '$isi', '$tanggal')";
    
    if (mysqli_query($koneksi, $query)) {
        echo json_encode(["status" => "success", "message" => "Artikel berhasil disimpan ke database!"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($koneksi)]);
    }
}
?>