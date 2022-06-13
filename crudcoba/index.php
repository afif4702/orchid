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
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Your edit is unsucsessful. Please try again!');
						document.location='index.php';
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
			// $simpan2 = mysqli_query($koneksi, "INSERT INTO pembayaran (id_reservasi, jenis_pembayaran)
			// 							  VALUES (
			// 							  		 '$_POST[id_reservasi]', 
			// 									  '$_POST[jenpem]'
			// 									   )
			// 							 ");
      
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!');
						document.location='index.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Your booking request failed. Please try again.');
						document.location='index.php';
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
						document.location='index.php';
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
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Orchid</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#book-a-table">Reservasi</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="kontol.php" class="book-a-table-btn scrollto d-none d-lg-flex">Log in as Admin</a>

    </div>
  </header><!-- End Header -->

<!-- Hero -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Orchid</span></h1>
          <h2>The Best Food in Town</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- ======= About Section ======= -->
<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>About Us</h3>
            <p class="fst-italic">
			Orchid specializes in delicious food featuring fresh ingredients and masterful preparation by the Orchid’s culinary team. Whether you’re ordering a multi-course meal or grabbing a drink and pizza at the bar, Orchid lively, casual yet upscale atmosphere makes it perfect for dining with friends, family, clients and business associates.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> SATURDAY THROUGH THURSDAY  (9:00AM - 3:00PM) </li>
              <li><i class="bi bi-check-circle"></i> FRIDAY CLOSED</li>
            </ul>
            <p>
            INDOOR & OUTDOOR SEATING, TAKEOUT, AND DELIVERY AVAILABLE
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

	<!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-starters">Starters</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lobster Bisque</a><span>$5.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Bread Barrel</a><span>$6.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Crab Cake</a><span>$7.95</span>
            </div>
            <div class="menu-ingredients">
              A delicate crab cake served on a toasted roll with lettuce and tartar sauce
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Caesar Selections</a><span>$8.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Tuscan Grilled</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Grilled chicken with provolone, artichoke hearts, and roasted red pesto
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Mozzarella Stick</a><span>$4.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Greek Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Spinach Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lobster Roll</a><span>$12.95</span>
            </div>
            <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->



<!-- Form Reservasi -->
<section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Reservation</h2>
            <p>Book a Table</p>
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
                  <input type="time" class="form-control" name="time" id="people" min="09:00" max="15:00" placeholder="Time" data-rule="minlen:1" value="<?=@$time?>" data-msg="Please enter at least 1 chars" required>
                  <div class="validate"></div>
                </div>
                <div class=" form-group mt-3 text-center">
                  <input type="radio" name="jenpem" id="people" placeholder="" data-rule="minlen:1"  value='1'>Tunai</input>
                  <input type="radio" name="jenpem" id="people" placeholder="" data-rule="minlen:1"  value='2'>Non Tunai</input>
                  <div class="validate"></div>
                </div>
                <br>
              </div>
                </div>
                <div class="text-center">
                <button type="submit" class="button" name="bsimpan">Book a table</button>
                <button type="reset"  class="button" name="breset">Reset</button>
                </div>
    
            </form>
        </div>
    </section>
    <!-- End Book A Table Section -->

<!-- Contact -->
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Perumahan Langit Tunggulwulung No. 19</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                SATURDAY THROUGH THURSDAY  (9:00AM - 3:00PM) 
<br>
                  09:00 AM - 03:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>orchid@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>081333444555</p>
              </div>

            </div>

          </div>


        </div>

      </div>
    </section>

<!-- Footer -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>ORCHID</h3>
              <p>
              Perumahan Langit Tunggulwulung No. 19<br><br>
                <strong>Phone:</strong> 081333444555<br>
                <strong>Email:</strong> orchid@gmail.com<br>
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

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
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