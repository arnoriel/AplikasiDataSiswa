<!DOCTYPE html>
<html>
<head>
	<title>CETAK DATA SISWA</title>
</head>
<body>
 <center>
	<h2>Data Siswa SMK PI</h2>
                            <table border="1" class="table" id="author" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
									<th>Kelas</th>
									<th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
			<?php 
            include 'koneksi.php';
			$no = 1;
			$data = mysqli_query($koneksi,"select * from siswa");

			while($d=mysqli_fetch_array($data)){
				?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
										<td><?php echo $d['kelas']; ?></td>
										<td><?php echo $d['jk']; ?></td>
                                    </tr>
									<?php 
			}
			?>
                            </tbody>
                            </table>
 
	<script>
		window.print();
	</script>
 </center>
</body>
</html>