<div class="container">
	<div class="card mx-auto" style="margin-top: 180px; width: 80%">
		<div class="card-header">
			Data Pesanan Anda
		</div>

		<span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan')?></span>
		<div class="card-body">
			<table class="table table-bordered table-stripped">
				<tr>
					<th>No</th>
					<th>Nama Pelanggan</th>
					<th>Nama Produk</th>
					<th>Jenis</th>
					<th>Harga Satuan</th>
					<th>Aksi</th>
				</tr>

				<?php $no=1; foreach($detail_pemesanan as $dp) : ?>
				<tr>
					<td><?php echo $no++?></td>
					<td><?php echo $dp->nama_pelanggan?></td>
					<td><?php echo $dp->nama_produk?></td>
					<td><?php echo $dp->jenis?></td>
					<td>Rp.<?php echo number_format($dp->harga,0,',','.')?></td>
					<td>
						<?php if($dp->status_pemesanan == "ACC") { ?>
							<button class="btn btn-sm btn-danger">Pemesanan Selesai</button>
						<?php }else{ ?>
							<a href="<?php echo base_url('customer/pemesanan/pembayaran/'.$dp->id_pemesanan)?>" class="btn btn-sm btn-success">Cek Pembayaran</a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach; ?>

			</table>
		</div>
	</div>	
</div>