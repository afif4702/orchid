<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<style>
    img{width:100%;}
</style>
<div class="container">
    <br>
    <div class="row">
  <div class="col-md-12">
    <h4>List of News Section</h4>
    <p>Find the updates on Latest News in this area</p>
  </div>
 </div>
    <?php
    // import file database.php untuk menggunakan fungsi di dalamnya
    include "database.php";

    //melakukan looping
    while($data = mysqli_fetch_array($select)){ ?>
        <div class="row">
            <div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="http://www.3forty.media/cannix/wp-content/uploads/2018/03/clem-onojeghuo-127166-unsplash-1-500x333.jpg ">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news-title">
                                            <a href="#">
                                                <!-- menampilkan data judul -->
                                                <h5><?php echo $data['judul']; ?></h5>
                                            </a>
                                        </div>
                                        <div class="news-cats">
                                            <ul class="list-unstyled list-inline mb-1">
                                                <li class="list-inline-item">
                                                    <i class="fa fa-user text-danger"></i>
                                                    <!-- menampilkan data nama dan status dari tabel user -->
                                                    <a href="#"><small><?php echo $data['nama']; ?></small> - <small><?php echo $data['status']; ?></small></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <i class="fa fa-calendar text-danger"></i>
                                                    <!-- menampilkan data tanggal -->
                                                    <a href="#"><small><?php echo $data['tanggal']; ?></small></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="news-content">
                                            <p><?php echo $data['isi']; ?></p>
                                        </div>
                                        <div class="news-buttons">
                                            <button type="button" class="btn btn-outline-danger btn-sm">Read More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>