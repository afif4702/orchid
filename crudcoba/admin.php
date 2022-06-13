<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "root";
	$database = "orchid";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Orchid</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>

<!-- ======= Header admin ======= -->
<header id="headeradmin" class="d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="index.php">Orchid</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#reservasi">Data Reservasi</a></li>
          <li><a class="nav-link scrollto" href="#pembayaran">Data Pembayaran</a></li>
          <li><a class="nav-link scrollto" href="#menu">Data Menu</a></li>
          <li><a class="nav-link scrollto" href="#meja">Data Meja</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

<section id="reservasi">

    <div class="card mt-3">
          <div class="card-header bg-success text-white">
            Daftar Reservasi Pelanggan
          </div>
          <div class="card-body">
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th> 
                    <th>ID Reservasi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Jumlah Kursi</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Jenis Pembayaran</th>
    
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from reservasi order by id_reservasi asc");
                    while($data = mysqli_fetch_array($tampil)) :
    
                ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['id_reservasi']?></td>
                    <td><?=$data['nama_pelanggan']?></td>
                    <td><?=$data['email']?></td>
                    <td><?=$data['no_hp']?></td>
                    <td><?=$data['jumlah_kursi']?></td>
                    <td><?=$data['tanggal']?></td>
                    <td><?=$data['waktu']?></td>
                    <td><?=$data['jenis_pembayaran']?></td>
    
                    <td>
                        <a href="edit.php?hal=edit&id=<?=$data['id_reservasi']?>" class="btn btn-warning"> Edit </a>
                        <a href="edit.php?hal=hapus&id=<?=$data['id_reservasi']?>" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
            <?php endwhile; //penutup perulangan while ?>
            </table>
    
          </div>
        </div>
</section>

<section id="pembayaran">

    <div class="card mt-3">
          <div class="card-header bg-success text-white">
            Daftar Pembayaran Pelanggan
          </div>
          <div class="card-body">
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>ID Reservasi</th>
                    <th>Jenis Pembayaran</th>
    
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from pembayaran order by id_pembayaran asc");
                    while($data = mysqli_fetch_array($tampil)) :
    
                ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['id_reservasi']?></td>
                    <td><?=$data['jenis_pembayaran']?></td>
    
                    <td>
                        <a href="edit.php?hal=edit&id=<?=$data['id_pembayaran']?>" class="btn btn-warning"> Edit </a>
                        <a href="edit.php?hal=hapus&id=<?=$data['id_pembayaran']?>" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
            <?php endwhile; //penutup perulangan while ?>
            </table>
    
          </div>
        </div>
</section>

<section id="menu">
<div class="card mt-3">
	  <div class="card-header bg-success text-white d-flex align-items-center justify-content-lg-between">
	    Daftar Menu
      <div>
      <a href="TambahMenu.php?" class="btn btn-warning"> Tambah </a></div>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
				<th>No.</th>
        <th>ID Reservasi</th>
				<th>Nama Menu</th>
	    		<th>Jenis Menu</th>
	    		<th>Harga</th>
	    		<th>Deskripsi</th>
	    		<th>Gambar</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from menu order by id_menu asc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nama_menu']?></td>
	    		<td><?=$data['jenis_menu']?></td>
	    		<td><?=$data['harga']?></td>
	    		<td><?=$data['deskripsi_menu']?></td>
	    		<td><?=$data['gambar_menu']?></td>
	    		<td>
	    			<a href="editMenu.php?hal=edit&id=<?=$data['id_menu']?>" class="btn btn-warning"> Edit </a>
	    			<a href="editMenu.php?hal=hapus&id=<?=$data['id_menu']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
	  </div>
	</div>
          </section>

<section id="meja">

    <div class="card mt-3">
          <div class="card-header bg-success text-white">
            Daftar Meja
          </div>
          <div class="card-body">
            
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>Id Reservasi</th>
                    <th>Jenis</th>
                </tr>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * from meja order by id_meja asc");
                    while($data = mysqli_fetch_array($tampil)) :
    
                ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=$data['id_reservasi']?></td>
                    <td><?=$data['jenis_meja']?></td>
                    <td>
                        <a href="edit.php?hal=hapus&id=<?=$data['id_meja']?>" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
            <?php endwhile; //penutup perulangan while ?>
            </table>
    
          </div>
        </div>
</section>

    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>ORCHID</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

  </footer>
    </body>
</html>