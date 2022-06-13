<!DOCTYPE html>
<html>
<head>
	<title>Orchid</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('style.css')}}" rel="stylesheet">

</head>
<body>

<!-- ======= Header admin ======= -->
<header id="headeradmin" class="d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="/index">Orchid</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
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
                @foreach($serves as $s)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$s -> id}}</td>
                    <td>{{$s -> nama}}</td>
                    <td>{{$s -> email}}</td>
                    <td>{{$s -> no_hp}}F</td>
                    <td>{{$s -> jumlah_kursi}}</td>
                    <td>{{$s -> tanggal}}</td>
                    <td>{{$s -> waktu}}</td>
                    <td>{{$s -> jenis}}</td>
    
                    <td>
                        <a href="/konfirmasi/{{$s -> id}}/konfirmasimeja" class="btn btn-warning"> Konfirmasi Meja</a>
                        <a href="/konfirmasi/{{$s -> id}}/konfirmasitransaksi" class="btn btn-warning"> Konfirmasi Transaksi</a>
                        <a href="/pesan/{{$s -> id}}/edit" class="btn btn-warning"> Edit </a>
                        <a href="/pesan/{{$s -> id}}/delete" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
                @endforeach
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
                    <th>ID Transaksi</th>
                    <th>ID Reservasi</th>
                    <th>Jenis Pembayaran</th>
    
                </tr>
                <tr>
                @foreach($transaksi as $t)
                    <td>{{$nos++}}</td>
                    <td>{{$t -> id}}</td>
                    <td>{{$t -> id_reservasi}}</td>
                    <td>{{$t -> jenis}}</td>
    
                    <td>
                        <a href="/transaksi/{{$t -> id}}/deletetransaksi" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
                @endforeach
            </table>
    
          </div>
        </div>
</section>

<section id="menu">
<div class="card mt-3">
	  <div class="card-header bg-success text-white d-flex align-items-center justify-content-lg-between">
	    Daftar Menu
      <div>
      <a href="/tambah-menu" class="btn btn-warning"> Tambah </a></div>
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
				<th>No.</th>
        <th>ID Menu</th>
				<th>Nama Menu</th>
	    		<th>Jenis Menu</th>
	    		<th>Harga</th>
	    		<th>Deskripsi</th>
	    	</tr>
        @foreach($menus as $m)
	    	<tr>
	    		<td>{{$nosss++}}</td>
	    		<td>{{$m -> id}}</td>
          <td>{{$m -> nama}}</td>
	    		<td>{{$m -> jenis}}</td>
	    		<td>{{$m -> harga}}</td>
	    		<td>{{$m -> deskripsi}}</td>
	    		<td>
	    			<a href="/menu/{{$m -> id}}/editmenu" class="btn btn-warning"> Edit </a>
	    			<a href="/menu/{{$m -> id}}/deletemenu" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
        @endforeach
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
                    <th>Id Meja</th>
                    <th>Id Reservasi</th>
                    <th>Jumlah Kursi</th>
                </tr>
                <tr>
                @foreach($mejas as $j)
                    <td>{{$noss++}}</td>
                    <td>{{$j -> id}}</td>
                    <td>{{$j -> id_reservasi}}</td>
                    <td>{{$j -> jumlah_kursi}}</td>
                    <td>
                        <a href="/meja/{{$j -> id}}/deletemeja" 
                           onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
                @endforeach
            </table>
    
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
              <li><i class="bx bx-chevron-right"></i> <a href="/index">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
  </footer>
    </body>
</html>