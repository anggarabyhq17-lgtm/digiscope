<?php
include 'koneksi.php';

header('Content-Type: application/json');

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $query = "DELETE FROM artikel WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($koneksi)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID tidak valid']);
}
?>