<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM data_produk WHERE id_produk='".$_GET['kode']."'";
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
					<input type="number" class="form-control" id="id_produk" name="id_produk" value="<?php echo $data_cek['id_produk']; ?>" readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo $data_cek['nama_produk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Merek Produk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="merek_produk" name="merek_produk" value="<?php echo $data_cek['merek_produk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ukuran Produk</label>
				<div class="col-sm-5">
				<select name="stok_produk" class="form-control" id="ukuran_produk" name="ukuran_produk" value="<?php echo $data_cek['ukuran_produk']; ?>">
						<option>Pilih Ukuran Produk</option>
						<option value="S">S</option>
						<option value="M">M</option>
						<option value="L">L</option>
						<option value="XL">XL</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Produk</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="harga_produk" name="harga_produk" value="<?php echo $data_cek['harga_produk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Stok Produk</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="stok_produk" name="stok_produk" value="<?php echo $data_cek['stok_produk']; ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-6">
					<input type="file" id="foto" name="foto">
					<p class="help-block">
						<font color="red">"Format file Jpg/Png"</font>
					</p>
				</div>
			</div>

		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-produk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

	
if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){
        $foto= $data_cek['foto'];
            if (file_exists("foto/$foto")){
            unlink("foto/$foto");}

        $sql_ubah = "UPDATE data_produk SET
			nama_produk='".$_POST['nama_produk']."',
			merek_produk='".$_POST['merek_produk']."',
			ukuran_produk='".$_POST['ukuran_produk']."',
			harga_produk='".$_POST['harga_produk']."',
			stok_produk='".$_POST['stok_produk']."',
			foto='".$nama_file."'		
            WHERE id_produk='".$_POST['id_produk']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
		$sql_ubah = "UPDATE data_produk SET
			nama_produk='".$_POST['nama_produk']."',
			merek_produk='".$_POST['merek_produk']."',
			ukuran_produk='".$_POST['ukuran_produk']."',
			harga_produk='".$_POST['harga_produk']."',
			stok_produk='".$_POST['stok_produk']."'		
			WHERE id_produk='".$_POST['id_produk']."'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-produk';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-produk';
            }
        })</script>";
    }
}