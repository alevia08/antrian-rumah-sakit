<?php 
include 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pasien = $_POST['nama_pasien'];
    $nomor_antrian = $_POST['nomor_antrian'];
    $waktu_kedatangan = $_POST['waktu_kedatangan'];
    $sql = "INSERT INTO antrian (nama_pasien, nomor_antrian, waktu_kedatangan) VALUES (:nama_pasien, :nomor_antrian, :waktu_kedatangan)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nama_pasien', $nama_pasien);
    $stmt->bindParam(':nomor_antrian', $nomor_antrian);
    $stmt->bindParam(':waktu_kedatangan', $waktu_kedatangan);

    if ($stmt->execute()) {
        // echo "Data antrian berhasil ditambahkan!";
        header("Location:?page=daftarantrian");
    } else {
        echo "Error: Gagal menambahkan data.";
    }

}
?>
<div class="container" style="border-width: 3px; border-style: solid; border-color: skyblue; margin-top: 100px; border-radius: 45px; width: 500px; height: 400px; background-color:skyblue;">
    <div class="row">
        <div class="col-md-12 mt-5">
<form method="POST">
    <p class="text-light">Nama Pasien: <input type="text"  class="form-control"  name="nama_pasien" required></p> <br>
    <p class="text-light">Nomor Antrian: <input type="number" class="form-control" name="nomor_antrian" required></p> <br>
    <p class="text-light">Waktu Kedatangan: <input type="datetime-local" class="form-control" name="waktu_kedatangan" required></p> <br>
    <input type="submit" class="bg-danger text-light" value="Tambah Antrian">
</form>
</div>
</div>
</div>