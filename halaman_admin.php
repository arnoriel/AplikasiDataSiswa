<!DOCTYPE html>
<html>
<head>
	<title>Admin Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script type="text/javascript" src="Charts/Chart.js"></script>
	<link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
          integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
          crossorigin="anonymous"
        />
        <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
        />
</head>
<body>

    <style type="text/css">
	
	li {
        list-style: none;
        margin: 20px 0 20px 0;
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        margin-left: -300px;
        transition: 0.4s;
    }

    .active-main-content {
        margin-left: 250px;
    }

    .active-sidebar {
        margin-left: 0;
    }

    #main-content {
        transition: 0.4s;
    }

	</style>
 
	<?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<nav class="navbar sticky-top bg-body-tertiary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		<button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
          </button> Aplikasi Data Sekolah</a>
	</div>
</nav>

<div>
<div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white"> Data Sekolah</h4>
			<li>
              <a class="text-white" href="halaman_admin.php">
                <i class="bi bi-house mr-2"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a class="text-white" href="siswaadmin.php">
                <i class="bi bi-people mr-2"></i>
                Data Siswa
              </a>
            </li>
            <li>
              <a class="text-white" href="logout.php">
              <i class="bi bi-box-arrow-left mr-2"></i>
                Logout
              </a>
            </li>
          </div>
        </div>
		<section class="p-4" id="main-content">

<div class="container">
<h2>Dashboard Admin</h2>
<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
    <?php 
	include 'koneksi.php';

	$siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
	$jumlah_siswa = mysqli_num_rows($siswa);

	$walikelas = mysqli_query($koneksi, "SELECT * FROM walikelas");
	$jumlah_walikelas = mysqli_num_rows($walikelas);

	$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
	$jumlah_kelas = mysqli_num_rows($kelas);
	?>
	
<div class="card text-bg-light mb-3">
  <div class="card-header text-bg-primary mb-3">
    <h5>Data Siswa</h5>
  </div>
  <div class="card-body">
  <h5>Diagram Data Jenis Kelamin Siswa</h5>
  <br>
    <div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
  </div>
</div>
<br>
<div class="container text-center">
  <div class="row">
    <div class="col">
	<div class="card text-bg-light mb-3">
  <div class="card-header text-bg-primary mb-3">
    <h5>Data Kelas</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Total Data Kelas</h5>
    <p class="card-text"><h2><?php echo $jumlah_kelas; ?></h2></p>
  </div>
</div>
	</div>
	<div class="col">
	<div class="card text-bg-light mb-3">
  <div class="card-header text-bg-primary mb-3">
    <h5>Data Siswa</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Total Data Siswa</h5>
    <p class="card-text"><h2><?php echo $jumlah_siswa; ?><h2></p>
  </div>
</div>
	</div>
    <div class="col">
	<div class="card text-bg-light mb-3">
  <div class="card-header text-bg-primary mb-3">
    <h5>Data Walikelas</h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Total Data Walikelas</h5>
    <p class="card-text"><h2><?php echo $jumlah_walikelas; ?></h2></p>
  </div>
</div>
    </div>
  </div>
</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki-laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_laki = mysqli_query($koneksi,"select * from siswa where jk='Laki-laki'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($koneksi,"select * from siswa where jk='Perempuan'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</div>
</div>
<script>
	 
		   // event will be executed when the toggle-button is clicked
		   document.getElementById("button-toggle").addEventListener("click", () => {
	 
			 // when the button-toggle is clicked, it will add/remove the active-sidebar class
			 document.getElementById("sidebar").classList.toggle("active-sidebar");
	 
			 // when the button-toggle is clicked, it will add/remove the active-main-content class
			 document.getElementById("main-content").classList.toggle("active-main-content");
		   });
	 
		 </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
		</section>
</body>
</html>