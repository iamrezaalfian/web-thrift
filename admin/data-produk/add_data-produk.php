<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Produk</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Produk</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="id_produk" name="id_produk" placeholder="id produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="nama produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Merek Produk</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="merek_produk" name="merek_produk" placeholder="merek produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ukuran Produk</label>
				<div class="col-sm-5">
				<select name="ukuran_produk" class="form-control" id="ukuran_produk" name="ukuran_produk" placeholder="ukuran produk" required>
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
					<input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="harga produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Stok Produk</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="stok_produk" name="stok_produk" placeholder="stok produk" required>
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

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-produk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
	$sumber = @$_FILES['foto']['tmp_name'];
	$target = 'foto/';
	$nama_file = @$_FILES['foto']['name'];
	$pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

		if(!empty($sumber)){
        $sql_simpan = "INSERT INTO data_produk (id_produk, nama_produk, merek_produk, ukuran_produk, harga_produk, stok_produk, foto) VALUES (
            '".$_POST['id_produk']."',
			'".$_POST['nama_produk']."',
			'".$_POST['merek_produk']."',
			'".$_POST['ukuran_produk']."',
			'".$_POST['harga_produk']."',
			'".$_POST['stok_produk']."',
            '".$nama_file."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-produk';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal (imunisasi Tidak Terdaftar)',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-data-produk';
          }
      })</script>";
	}
	}elseif(empty($sumber)){
		echo "<script>
		Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?page=add-data-produk';
			}
		})</script>";
	}
}
