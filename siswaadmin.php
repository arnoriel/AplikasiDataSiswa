<!DOCTYPE html>
<html>
<head>
	<title>Admin Data Siswa</title>
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
          </button> Data Sekolah</a>
		<form action="siswaadmin.php" method="get" class="d-flex" role="search">
			<input type="text" name="cari" class="form-control me-2" placeholder="Cari Nama Siswa....">
			<button class="btn btn-outline-success" type="sumbit">Search</button>
		</form>
	</div>
</nav>

<div>
<div class="sidebar p-4 bg-primary" id="sidebar">
            <h4 class="mb-5 text-white">Data Sekolah</h4>
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
<h1>Data Siswa</h1>
    <?php 
	include 'koneksi.php';
	?>

	<br/>
	<br/>

	<a href="tambahsiswa.php" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Siswa</a>
	<div class="table-responsive">
                            <table class="table" id="author">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
									<th>Kelas</th>
									<th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
			<?php 
            include 'koneksi.php';
			$no = 1;
			$data = mysqli_query($koneksi,"select * from siswa");

		if(isset($_GET['cari'])){
			$data = mysqli_query($koneksi, "select * from siswa WHERE nama LIKE '%".
			$_GET['cari']."%'");
		}

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $query = "DELETE FROM siswa WHERE id = '$id'";

            if ($koneksi->query($query) == TRUE) {
                echo "<script>alert('Data Berhasil di Hapus.'); window.location='siswaadmin.php';</script>";
            }
        }

			while($d=mysqli_fetch_array($data)){
				?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
										<td><?php echo $d['kelas']; ?></td>
										<td><?php echo $d['jk']; ?></td>
                                        <td>
											<a href="editsiswa.php?id=<?php echo $d['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <a href="hapussiswa.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Apakah Anda Yakin akan menghapus Data Siswa ini?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <!-- Button trigger modal -->
                                        </td>
                                    </tr>
									<?php 
			}
			?>
                            </tbody>
                            </table>
                        </div>
 
                        <a href="cetak.php" target="_BLANK" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-down"></i> Cetak</a>	
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