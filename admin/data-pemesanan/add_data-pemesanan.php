<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Invoice</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Pemesanan</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder="id produk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Produk</label>
				<div class="col-sm-5">
				<select name="nama_produk" class="form-control" id="nama_produk" name="nama_produk" placeholder="nama produk" required>	
					<option>Pilih Jenis Produk</option>
						<?php
							$query = mysqli_query($koneksi, "SELECT nama_produk FROM data_produk");
							while ($row=mysqli_fetch_array($query)) {
								?>
								<option value="<?php echo $row['nama_produk'] ?>"><?php echo $row['nama_produk']; ?></option>
								<?php
							}
						?>
				</select>
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
				<label class="col-sm-2 col-form-label">Jumlah Beli</label>
				<div class="col-sm-5">
					<input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="harga produk" required>
				</div>
			</div>


		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pemesanan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
		
        $sql_simpan = "INSERT INTO data_pemesanan (id_pemesanan, nama_produk, ukuran_produk, harga_produk, jumlah_beli) VALUES (
            '".$_POST['id_pemesanan']."',
			'".$_POST['nama_produk']."',
			'".$_POST['ukuran_produk']."',
			'".$_POST['harga_produk']."',
			'".$_POST['jumlah_beli']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pemesanan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-data-pemesanan';
          }
      })</script>";
	}
	}