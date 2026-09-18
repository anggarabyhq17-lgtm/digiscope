<?php
// Jangan tampilkan error langsung ke output agar format JSON tidak rusak
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');

include 'koneksi.php';

if (!$koneksi) {
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}

$query = "SELECT * FROM artikel ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    echo json_encode(['error' => 'Query Error: ' . mysqli_error($koneksi)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>