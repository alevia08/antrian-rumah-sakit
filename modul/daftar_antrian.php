<?php
include "lib/koneksi.php";

//Menyiapkan query untuk mengambil data antrian
$sql = "SELECT * FROM antrian";
$stmt = $conn->prepare($sql);
$stmt->execute(); // Eksekusi query

// Menampilkan hasil query dengan desain yang lebih menarik
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Daftar Antrian Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 90%;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 20px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #1E90FF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #E6F2FF;
        }
        tr:nth-child(odd) {
            background-color: #F8FBFF;
        }
        tr:hover {
            background-color: #D1E9FF;
        }
        .action-links a {
            color: #1E90FF;
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
        }
        .action-links a:hover {
            color: #0056b3;
        }
        .no-data {
            text-align: center;
            color: #777;
            font-size: 18px;
            margin: 20px;
        }
    </style>
</head>
<body>
";

echo "<h2>Daftar Antrian Pasien</h2>";
echo "<table>
<tr>
<th>No</th>
<th>Nama Pasien</th>
<th>Nomor Antrian</th>
<th>Waktu Kedatangan</th>
<th>Status</th>
<th>Aksi</th>
</tr>";

// Ambil semua data hasil query
$antrian = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($antrian) > 0) {
    $no = 1;
    foreach ($antrian as $row) {
        echo "<tr>
        <td>" . $no . "</td>
        <td>" . htmlspecialchars($row["nama_pasien"]) . "</td>
        <td>" . htmlspecialchars($row["nomor_antrian"]) . "</td>
        <td>" . htmlspecialchars($row["waktu_kedatangan"]) . "</td>
        <td>" . htmlspecialchars($row["status"]) . "</td>
        <td class='action-links'>
            <a href='modul/ubah_status.php?id=" . $row["id"] . "'>Ubah Status</a> | 
            <a href='modul/hapus_antrian.php?id=" . $row["id"] . "'>Hapus</a>
        </td>
        </tr>";
        $no++;
    }
    echo "</table>";
} else {
    echo "<div class='no-data'>Tidak ada antrian.</div>";
}

echo "
</body>
</html>
";

$conn = null; // Menutup Koneksi PDO
?>
