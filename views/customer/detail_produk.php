<div class="container mt-5 mb-5">
	<div class="card" style="margin-top: 200px">
		<div class="card-body">
			<?php foreach ($detail as $dt) : ?>
				<div class="row">
					<div class="col-md-6">
						<img style="width: 90%" src="<?php echo base_url('assets/upload/').$dt->gambar?>">
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Nama Produk</th>
								<td><?php echo $dt->nama_produk?></td>
							</tr>

							<tr>
								<th>Harga</th>
								<td><?php echo $dt->harga?></td>
							</tr>

							<tr>
								<th>Status</th>
								<td>
									<?php if($dt->status == '1'){
										echo "<span class='badge badge-primary'>Tersedia</span>";
										}else{
										echo "<span class='badge badge-danger'>Tidak Tersedia/Bahan Habis</span>";
										}
									?>	
								</td>
							</tr>

							<tr>
								<th>Keterangan</th>
								<td><?php echo $dt->ket?></td>
							</tr>

							<tr>
								<td></td>
								<td>
									<?php 
					                if ($dt->status == "0"){
					                  echo "<span class='btn btn-danger' disable>Produk Habis</span>";
					                }else{
					                  echo anchor('customer/pesan/tambah_pesanan'.$dt->id_produk, '<button class="btn btn-success">Pesan</button>');
					                }
					                ?>
								</td>
							</tr>
					</table>
					</div>
				</div>
			<?php endforeach; ?>
		</div>		
	</div>	
</div>