<?php
	include "../inc/koneksi.php";
	
	$id_pemesanan = $_GET['id_pemesanan'];

	$sql_cek = "SELECT * FROM profil";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	{
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK INVOICE PRODUK</title>
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

			$sql_tampil = "select * from data_pemesanan where id_pemesanan='$id_pemesanan'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>INVOICE PRODUK</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" style="width: 90%" align="center">
		<tbody>
			<tr>
				<td>Id Produk</td>
				<td>:</td>
				<td>
					<?php echo $data['id_pemesanan']; ?>
				</td>
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
				<td>Ukuran</td>
				<td>:</td>
				<td>
					<?php echo $data['ukuran_produk']; ?>
				</td>
			</tr>
			<tr>
				<td>Jumlah Beli</td>
				<td>:</td>
				<td>
					<?php echo $data['jumlah_beli']; ?>
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
				<td>Total Bayar</td>
				<td>:</td>
				<td>
					<?php echo $data['harga_produk']*$data['jumlah_beli']; ?>
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