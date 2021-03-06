<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Update Data Produk</h1>
          </div>


        <div class="card">
     	<div class="card-body">

        <?php foreach ($produk as $pd) : ?>

     		<form method="POST" action="<?php echo base_url('admin/data_produk/update_produk_aksi')?>" enctype="multipart/form-data">
     		<div class="row">
     			<div class="col-md-6">

     				<div class="form-group">
     					<label>Nama Produk</label> 
                        <input type="hidden" name="id_produk" value="<?php echo $pd->id_produk?>">
     					<input type="text" name="nama_produk" class="form-control" value="<?php echo $pd->nama_produk?>">
     					<?php echo form_error('nama_produk', '<div class="text-small text-danger">','</div>')?>
     				</div>

                    <div class="form-group">
                        <label>Harga(Lembar/m2)</label> 
                        <input type="number" name="harga" class="form-control" value="<?php echo $pd->harga?>">
                        <?php echo form_error('harga', '<div class="text-small text-danger">','</div>')?>
                    </div>                    


     				<div class="form-group">
     					<label>Gambar</label> 
     					<input type="file" name="gambar" class="form-control">    				
     				</div>

                    <div class="form-group">
                        <label>Status</label> 
                        <select name="status" class="form-control">
                              <option <?php if ($pd->status == "1"){echo "selected='selected'";}
                                       echo $pd->status; ?> value="1">Tersedia</option>
                              <option <?php if ($pd->status == "0"){echo "selected='selected'";}
                                       echo $pd->status; ?> value="0">Tidak Tersedia</option>
                        </select>                   
                    <?php echo form_error('status', '<div class="text-small text-danger">','</div>')?>
             </div>

     				<button type="submit" class="btn btn-primary mt-4">Simpan</button>
     				<button type="reset" class="btn btn-danger mt-4">Reset</button>
     			</div>
     		</div>
     		</form>
            <?php endforeach; ?>
     	</div>
     </div>


        </section>
</div>