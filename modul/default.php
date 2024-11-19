<div class="container-fluid p-5 bg-primary text-white text-center">
  		<h1>WELCOME</h1>
  		<p>Selamat Datang <?=$resultuser['username']?></p> 
      <a href="?page=keluar" class="btn btn-danger">Log Out</a>
	</div>
	<div class="container mt-5">
  <div class="row">
    <div class="col-sm-6">
      <h3>Tambah Antrian</h3>
      <div class="card" style="width: 200px;">
      	<a href="?page=tambahantrian"><img class="card-img-top" src="asset/img/tambah.png" alt="card image"></a>
      </div>
    </div>
    <div class="col-sm-6">
      <h3>Daftar Antrian</h3>
 		<div class="card" style="width: 200px;">
      	<a href="?page=daftarantrian"><img class="card-img-top" src="asset/img/daftar.png" alt="card image"></a>
      </div>
    </div>
    </div>
  </div>
</div>