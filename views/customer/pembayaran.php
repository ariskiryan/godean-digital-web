<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card" style="margin-top: 150px">
				<div class="card-header alert alert-success">
					Invoice Pembayaran Anda
				</div>

				<div class="card-body">
					<table class="table">
						<?php foreach($detail_pemesanan as $dp): ?>
						<tr>
							<th>Nama Produk</th>
							<td>:</td>
							<td><?php echo $dp->nama_produk?></td>
						</tr>

						<tr>
							<th>Tanggal Pemesanan</th>
							<td>:</td>
							<td><?php echo $dp->tgl_pesan?></td>
						</tr>

						<tr>
							<th>Tanggal Selesai</th>
							<td>:</td>
							<td><?php echo $dp->tgl_selesai?></td>
						</tr>

						<tr>
							<th>Harga Satuan</th>
							<td>:</td>
							<td>Rp.<?php echo number_format($dp->harga,0,',','.')?></td>
						</tr>

						<tr>
							<td></td>
							<td></td>
							<td><a href="" class="btn btn-sm btn-secondary">Print Invoice</a></td>
						</tr>
					<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="margin-top: 150px">
				<div class="card-header alert alert-primary">
					Informasi Pembayaran
				</div>

				
				<div class="card-body">
					<p class="text-success mb-2">Silahkan Melakukan Pembayaran Melalui Nomor Rekening di Bawah ini:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">Bank BCA 067789899</li>
						<li class="list-group-item">Bank BRI 80983112300</li>
						<li class="list-group-item">Bank Mandiri 85554342211</li>
					</ul>

					<?php 
						if(empty($dp->bukti_pembayaran)) { ?>
							<button style="width: 100%" type="button" class="btn btn-warning mt-3" data-toggle="modal" data-target="#exampleModal">
							  Upload Bukti Pembayaran
							</button>
						<?php }elseif($dp->status_pembayaran == '0'){ ?>
							<button style="width: 100%" class="btn btn-sm btn-danger"><i class="fa fa-clock-o"></i> Menunggu Konfirmasi</button>
						<?php }elseif($dp->status_pembayaran == '1') {?>
							<button style="width: 100%" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Pembayaran Selesai</button>
						<?php }?>
				</div>				
			</div>
		</div>
	</div>
</div>

<!--Modal Upload Bukti Pembayaran-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="<?php echo base_url('customer/pemesanan/pembayaran_aksi');?>" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="form-group">
	        	<label>Upload Bukti Pembayaran</label>
	        	<input type="hidden" name="id_pemesanan" value="<?php echo $dp->id_pemesanan?>" class="form-control">
	        	<input type="file" name="bukti_pembayaran" class="form-control">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-success">Kirim</button>
	      </div>
      </form>

    </div>
  </div>