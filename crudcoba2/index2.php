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
			$edit = mysqli_query($koneksi, "UPDATE menu set
											 	nama_menu = '$_POST[nama]',
											 	jenis_menu = '$_POST[jenis]',
												harga = '$_POST[harga]',
											 	deskripsi_menu = '$_POST[deskripsi]',
											 	gambar_menu = '$_POST[gambar]'
											 WHERE id_menu = '$_GET[id]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='index2.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='index2.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO menu (nama_menu, jenis_menu, harga, deskripsi_menu, gambar_menu)
										  VALUES ('$_POST[nama]', 
										  		 '$_POST[jenis]', 
										  		 '$_POST[harga]', 
										  		 '$_POST[deskripsi]',
										  		 '$_POST[gambar]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='index2.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='index2.php';
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
			$tampil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$nama = $data['nama_menu'];
				$jenis = $data['jenis_menu'];
				$harga = $data['harga'];
				$deskripsi = $data['deskripsi_menu'];
				$gambar = $data['gambar_menu'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM menu WHERE id_menu = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index2.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservasi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Mahasiswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>Nama Menu</label>
	    		<input type="text" name="nama" value="<?=@$nama?>" class="form-control" placeholder="" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis</label>
	    		<input type="text" name="jenis" value="<?=@$jenis?>" class="form-control" placeholder="" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Harga</label>
	    		<input type="text" name="harga" value="<?=@$harga?>" placeholder=""></input>
	    	</div>
	    	<div class="form-group">
	    		<label>Deskripsi</label>
	    		<input type="text" name="deskripsi" value="<?=@$deskripsi?>" class="form-control" placeholder="" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Gambar</label>
	    		<input type="file" name="gambar" accept="image/png, image/jpg, image/jpeg" value="<?=@$gambar?>" class="form-control" placeholder="" required>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Menu
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
				<th>No.</th>
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
	    			<a href="index2.php?hal=edit&id=<?=$data['id_menu']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index2.php?hal=hapus&id=<?=$data['id_menu']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>

	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>