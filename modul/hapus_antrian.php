<?php 
include '../lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM antrian WHERE id=$id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Data antrian sudah berhasil dihapus !!');</script>";

    } else {
        echo "Error : " . $stmt->errorInfo()[2];
    }
}


?>