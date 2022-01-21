<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM data_pemesanan WHERE id_pemesanan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data produk</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Produk</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="id_pemesanan" name="id_pemesanan" value="<?php echo $data_cek['id_pemesanan']; ?>" readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data_cek['nama_produk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ukuran Produk</label>
				<div class="col-sm-5">
				<select name="ukuran_produk" class="form-control" id="ukuran_produk" name="ukuran_produk" value="<?php echo $data_cek['ukuran_produk']; ?>">
						<option>Pilih Ukuran Produk</option>
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Beli</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" value="<?php echo $data_cek['jumlah_beli']; ?>">
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pemesanan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php	
if (isset ($_POST['Ubah'])){

    $sql_ubah = "UPDATE data_pemesanan SET
		nama_produk='".$_POST['nama_produk']."',
		ukuran_produk='".$_POST['ukuran_produk']."',
		jumlah_beli='".$_POST['jumlah_beli']."'
        WHERE id_pemesanan='".$_POST['id_pemesanan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pemesanan';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-pemesanan';
            }
        })</script>";
    }
}