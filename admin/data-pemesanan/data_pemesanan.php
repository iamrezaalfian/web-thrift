<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemesanan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-data-pemesanan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Invoice Pemesanan</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Pemesanan</th>
						<th>Nama Produk</th>
						<th>Ukuran Produk</th>
						<th>Harga Produk</th>
						<th>Jumlah Beli</th>
						<th>Kelola</th>
					</tr>
				</thead>
				<tbody>

					<?php
			  $sql = $koneksi->query("SELECT * from data_pemesanan");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $data['id_pemesanan']; ?>
						</td>
						<td>
							<?php echo $data['nama_produk']; ?>
						</td>
						<td>
							<?php echo $data['ukuran_produk']; ?>
						</td>
						<td>
							<?php echo $data['harga_produk']; ?>
						</td>
						<td>
							<?php echo $data['jumlah_beli']; ?>
						</td>

						<td>
							<a href="?page=edit-data-pemesanan&kode=<?php echo $data['id_pemesanan']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="./report/cetak-invoice.php?id_pemesanan=<?php echo $data['id_pemesanan']; ?>" title="Cetak Data produk" target=" _blank"
							class="btn btn-warning btn-sm">
								<i class="fa fa-print"></i>
							</a>
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