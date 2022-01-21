<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from data_produk WHERE id_produk='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-8">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail Data Produk</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>ID Produk</b>
							</td>
							<td>:
								<?php echo $data_cek['id_produk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama Produk</b>
							</td>
							<td>:
								<?php echo $data_cek['nama_produk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Merek Produk</b>
							</td>
							<td>:
								<?php echo $data_cek['merek_produk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Ukuran Produk</b>
							</td>
							<td>:
								<?php echo $data_cek['ukuran_produk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Harga produk</b>
							</td>
							<td>:
								<?php echo $data_cek['harga_produk']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Stok Produk</b>
							</td>
							<td>:
								<?php echo $data_cek['stok_produk']; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=data-produk" class="btn btn-warning">Kembali</a>

					<a href="./report/cetak-data.php?id_produk=<?php echo $data_cek['id_produk']; ?>" target=" _blank"
					 title="Cetak Data produk" class="btn btn-primary">Print</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-success">
			<div class="card-header">
				<center>
					<h3 class="card-title">
						Foto
					</h3>
				</center>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img src="foto/<?php echo $data_cek['foto']; ?>" width="280px" />
				</div>

				<h3 class="profile-username text-center">
					<?php echo $data_cek['id_produk']; ?>
					-
					<?php echo $data_cek['nama_produk']; ?>
				</h3>
			</div>
		</div>
	</div>

</div>