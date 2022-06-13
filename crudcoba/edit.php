<?php
	//Koneksi Database
	$server = "localhost";
	$user = "root";
	$pass = "root";
	$database = "orchid";

	$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan di edit
			$edit = mysqli_query($koneksi, "UPDATE reservasi set
											 	nama_pelanggan = '$_POST[nama]',
											 	email = '$_POST[email]',
												no_hp = '$_POST[hp]',
											 	jumlah_kursi = '$_POST[jumlah]',
											 	tanggal = '$_POST[date]',
											 	waktu = '$_POST[time]',
												jenis_pembayaran = '$_POST[jenpem]'
											 WHERE id_reservasi = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Your data has been sucsessfully edited!');
						document.location='admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Your edit is unsucsessful. Please try again!');
						document.location='admin.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO reservasi (nama_pelanggan, email, no_hp, jumlah_kursi, tanggal, waktu, jenis_pembayaran)
										  VALUES ('$_POST[nama]', 
										  		 '$_POST[email]', 
										  		 '$_POST[hp]', 
										  		 '$_POST[jumlah]',
										  		 '$_POST[date]',
										  		 '$_POST[time]',
												  '$_POST[jenpem]'
												   )
												
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');
						document.location='admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Your booking request failed. Please try again.');
						document.location='admin.php';
				     </script>";
			}
		}


		
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM reservasi WHERE id_reservasi = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$nama = $data['nama_pelanggan'];
				$email = $data['email'];
				$hp = $data['no_hp'];
				$jumlah = $data['jumlah_kursi'];
				$date = $data['tanggal'];
				$time = $data['waktu'];
				$jenpem = $data['jenis_pembayaran'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM reservasi WHERE id_reservasi = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='admin.php';
				     </script>";
			}
		}
	}
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
<!-- ======= Header ======= -->
<!-- <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Orchid</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">


    </div> -->
  </header><!-- End Header -->

  <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2>Reservation</h2>
              <p>Edit Data</p>
            </div>
  
          <form method="post" action="" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-4 col-md-6 form-group">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" value="<?=@$nama?>" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email"  value="<?=@$email?>" data-msg="Please enter a valid email" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="hp" id="phone" placeholder="Your Phone" data-rule="minlen:4" value="<?=@$hp?>" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <input type="number" name="jumlah" class="form-control" id="date" placeholder="Number of People" data-rule="minlen:4" value="<?=@$jumlah?>" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <input type="date" class="form-control" name="date" id="time" placeholder="Date" data-rule="minlen:4" value="<?=@$date?>" data-msg="Please enter at least 4 chars" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 form-group mt-3">
                  <input type="time" class="form-control" name="time" id="people" placeholder="Time" data-rule="minlen:1" value="<?=@$time?>" data-msg="Please enter at least 1 chars" required>
                  <div class="validate"></div>
                </div>
                <div class=" form-group mt-3 text-center">
                  <input type="radio" name="jenpem" id="people" placeholder="" data-rule="minlen:1"  value='1'>Tunai</input>
                  <input type="radio" name="jenpem" id="people" placeholder="" data-rule="minlen:1"  value='2'>Non Tunai</input>
                  <div class="validate"></div>
                </div>
              </div>
                </div>
            <div class="text-center"><button type="submit" name="bsimpan">Edit Data</button></div>
                <!-- <button type="submit" class="button" name="bsimpan">Edit Data</button> -->
    
            </form>
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
    <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    </body>
</html>