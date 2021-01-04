<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Tambah Data Produk</h1>
          </div>


        <div class="card">
     	<div class="card-body">

     		<form method="POST" action="<?php echo base_url('admin/data_produk/tambah_produk_aksi')?>" enctype="multipart/form-data">
     		<div class="row">
     			<div class="col-md-6">

     				<div class="form-group">
     					<label>Nama Produk</label> 
     					<input type="text" name="nama_produk" class="form-control">
     					<?php echo form_error('nama_produk', '<div class="text-small text-danger">','</div>')?>
     				</div>

                    <div class="form-group">
                        <label>Harga</label> 
                        <input type="number" name="harga" class="form-control">
                        <?php echo form_error('harga', '<div class="text-small text-danger">','</div>')?>
                    </div>


                </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gambar</label> 
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status</label> 
                            <select name="status" class="form-control">
                              <option value="">--Pilih Status--</option>
                              <option value="1">Tersedia</option>
                              <option value="0">Tidak Tersedia</option>
                            </select>                   
                              <?php echo form_error('status', '<div class="text-small text-danger">','</div>')?>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                        </div>
                    </div>

     		</div>
     		</form>
               
     	</div>
     </div>


        </section>
</div>