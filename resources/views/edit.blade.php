<!DOCTYPE html>
<html>

<head>
    <title>Orchid</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

</head>

<body>

    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Reservation</h2>
                <p>Edit a Table</p>
            </div>
            <form method="post" action="editupdate" data-aos="fade-up" data-aos-delay="100">
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-md-6 form-group">
                        @foreach ($serves as $s)
                            @if ($s->id == $sid)
                                <input type="text" class="form-control" value="{!!$s->nama!!}" id="nama" name="nama" placeholder="Your Name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                            @endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
						@foreach ($serves as $s)
                            @if ($s->id == $sid)
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            data-rule="email" value="{!! $s->email !!}" data-msg="Please enter a valid email"
                            required>
							@endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
						@foreach ($serves as $s)
                            @if ($s->id == $sid)
                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Your Phone"
                            data-rule="minlen:4" value="{!! $s->no_hp !!}"
                            data-msg="Please enter at least 4 chars" required>
							@endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3">
						@foreach ($serves as $s)
                            @if ($s->id == $sid)
                        <input type="number" name="jumlah_kursi" class="form-control" id="jumlah_kursi"
                            placeholder="Number of People" data-rule="minlen:4" value="{!! $s->jumlah_kursi !!}"
                            data-msg="Please enter at least 4 chars" required>
							@endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3">
						@foreach ($serves as $s)
                            @if ($s->id == $sid)
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Date"
                            data-rule="minlen:4" value="{!! $s->tanggal !!}"
                            data-msg="Please enter at least 4 chars" required>
							@endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group mt-3">
						@foreach ($serves as $s)
                            @if ($s->id == $sid)
                        <input type="time" class="form-control" name="waktu" id="waktu" min="09:00" max="15:00"
                            placeholder="Time" data-rule="minlen:1" value="{!! $s->waktu !!}"
                            data-msg="Please enter at least 1 chars" required>
							@endif
                        @endforeach
                        <div class="validate"></div>
                    </div>
                    <div class=" form-group mt-3 text-center">
                        <input type="radio" name="jenis" id="jenis" placeholder="" data-rule="minlen:1"
                            value='tunai'>Tunai</input>
                        <input type="radio" name="jenis" id="jenis" placeholder="" data-rule="minlen:1" value='non'>Non
                        Tunai</input>
                        <div class="validate"></div>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="button" name="submit">Edit Data </button>
                        <!-- <button type="reset"  class="button" name="breset">Reset</button> -->
                    </div>
                </div>

            </form>
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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('main.js') }}"></script>

</body>

</html>
