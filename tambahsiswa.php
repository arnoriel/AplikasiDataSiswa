<!DOCTYPE html>
<html>
<head>
	<title>Data Sekolah</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
	<h2>Data Sekolah</h2>
	<br>
  
    <div class="card">
        <div class="card-header">
	<h3>Tambah Data Siswa</h3>
        </div>
        <div class="card-body">
	<form method="post" action="tambah_aksi.php">
  <div class="form-group">
  <label for="">Masukan Nama</label>
  <input type="text" name="nama" class="form-control">
  <span class="invalid-feedback" role="alert">
  </span>
  <label for="">Masukan Kelas</label>
  <select class="form-select" aria-label="Default select example" name="kelas" id="" >
  <option selected>Pilih Kelas</option>
  <option value="X-RPL">X-RPL</option>
  <option value="X-TKJ">X-TKJ</option>
  <option value="X-DKV">X-DKV</option>
  <option value="X-TBSM">X-TBSM</option>
  <option value="X-TKRO">X-TKRO</option>
  <option value="X-TMP">X-TMP</option>
  <option value="X-TP">X-TP</option>
  <option value="X-OTKP">X-OTKP</option>
  <option value="X-HR">X-HR</option>
  <option value="XI-RPL">XI-RPL</option>
  <option value="XI-TKJ">XI-TKJ</option>
  <option value="XI-DKV">XI-DKV</option>
  <option value="XI-TBSM">XI-TBSM</option>
  <option value="XI-TKRO">XI-TKRO</option>
  <option value="XI-TMP">XI-TMP</option>
  <option value="XI-TP">XI-TP</option>
  <option value="XI-OTKP">XI-OTKP</option>
  <option value="XI-HR">XI-HR</option>
  <option value="XII-RPL">XII-RPL</option>
  <option value="XII-TKJ">XII-TKJ</option>
  <option value="XII-DKV">XII-DKV</option>
  <option value="XII-TBSM">XII-TBSM</option>
  <option value="XII-TKRO">XII-TKRO</option>
  <option value="XII-TMP">XII-TMP</option>
  <option value="XII-TP">XII-TP</option>
  <option value="XII-OTKP">XII-OTKP</option>
  <option value="XII-HR">XII-HR</option>
  </select>
  <label for="">Masukan Jenis Kelamin</label>
  <select class="form-select" aria-label="Default select example" name="jk" id="" >
   <option selected>Pilih Jenis Kelamin</option>
    <option value="Laki-Laki">Laki-Laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
      </div>
      <br>
      <div class="form-group">
    <button type="reset" class="btn btn-outline-warning">Reset</button>
    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
	</form>
        </div>
    </div>
    <br>
    <a href="siswaadmin.php" class="btn btn-danger">Kembali</a>
      <br>
                            
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
	 
		   // event will be executed when the toggle-button is clicked
		   document.getElementById("button-toggle").addEventListener("click", () => {
	 
			 // when the button-toggle is clicked, it will add/remove the active-sidebar class
			 document.getElementById("sidebar").classList.toggle("active-sidebar");
	 
			 // when the button-toggle is clicked, it will add/remove the active-main-content class
			 document.getElementById("main-content").classList.toggle("active-main-content");
		   });
	 
		 </script>
        </section>
</body>
</html>