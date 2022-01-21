<?php
	include "../inc/koneksi.php";
	
	$id_produk = $_GET['id_produk'];

	$sql_cek = "SELECT * FROM profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK DATA PRODUK</title>
</head>

<body>
	<center>

		<h2>
			<?php echo $data_cek['nama_profil']; ?>
		</h2>
		<h3>
			<?php echo $data_cek['alamat']; ?>
			<hr / size="2px" color="black">

			<?php
			}

			$sql_tampil = "select * from data_produk where id_produk='$id_produk'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>DATA PRODUK</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" style="width: 90%" align="center">
		<tbody>
			<tr>
				<td>Id Produk</td>
				<td>:</td>
				<td>
					<?php echo $data['id_produk']; ?>
				</td>
				<td rowspan="6" align="center">
					<img src="../foto/<?php echo $data['foto']; ?>" width="150px" />
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_produk']; ?>
				</td>
			</tr>
			<tr>
				<td>Merek</td>
				<td>:</td>
				<td>
					<?php echo $data['merek_produk']; ?>
				</td>
			</tr>
			<tr>
				<td>Ukuran</td>
				<td>:</td>
				<td>
					<?php echo $data['ukuran_produk']; ?>
				</td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>
					<?php echo $data['harga_produk']; ?>
				</td>
			</tr>
			<tr>
				<td>Stok</td>
				<td>:</td>
				<td>
					<?php echo $data['stok_produk']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


	<script>
		window.print();
	</script>

</body>

</html>