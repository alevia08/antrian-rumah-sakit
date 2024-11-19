<?php
include '../lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE antrian SET status = 'Selesai' WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        echo "Status pasien berhasil di ubah menjadi Selesai";
    } else {
        echo "Error: Gagal mengubah status.";
    }
}
$conn = null;
?>