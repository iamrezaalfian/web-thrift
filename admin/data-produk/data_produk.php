<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Produk</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-data-produk" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Produk</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Produk</th>
						<th>Foto</th>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Stok Produk</th>
						<th>Kelola</th>
					</tr>
				</thead>
				<tbody>

					<?php
			  $sql = $koneksi->query("SELECT * from data_produk");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['id_produk']; ?>
						</td>
						<td align="center">
							<img src="foto/<?php echo $data['foto']; ?>" width="200px" />
						</td>
						<td>
							<?php echo $data['nama_produk']; ?>
						</td>
						<td>
							<?php echo $data['harga_produk']; ?>
						</td>
						<td>
							<?php echo $data['stok_produk']; ?>
						</td>

						<td>
							<a href="?page=view-data-produk&kode=<?php echo $data['id_produk']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i>
							</a>
							</a>
							<a href="?page=edit-data-produk&kode=<?php echo $data['id_produk']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-data-produk&kode=<?php echo $data['id_produk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->