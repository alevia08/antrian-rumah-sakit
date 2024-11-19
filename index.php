<?php 
	session_start();
	include "lib/koneksi.php";

	if (!isset($_SESSION['iduser'])) {
		include "login.php";
	}else{
		$sqluser = $conn->prepare("SELECT*FROM users WHERE id = ?");
		$sqluser->execute([$_SESSION['iduser']]);
		$resultuser = $sqluser->fetch();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
  if (isset($_GET['page'])) {
?>
<div class="container mt-3">
  <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="http://localhost/antrian-rumah-sakit">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=tambah antrian">Tambah Antrian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?page=daftar antrian">Daftar Antrian</a>
        </li>
      </ul>
    </div>
</nav>
</div>

	<?php 
}
		$page= isset($_GET['page'])?$_GET['page']:null;
		if (isset($page)) {
			
			if ($page=='daftarantrian') {
				include "modul/daftar_antrian.php";
			}
			if ($page=='tambahantrian') {
				include "modul/tambah_antrian.php";
			}
			if ($page=='ubahantrian') {
				include "modul/ubah_antrian.php";
			}
			if ($page=='hapusantrian') {
				include "modul/hapusantrian.php";
			}
			if ($page=='keluar') {
				include "modul/logout.php";
			}
			
			}else{
			include "modul/default.php";
		}
    }
	 ?>