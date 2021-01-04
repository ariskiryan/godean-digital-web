<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Tambah Data Bahan</h1>
          </div>
        </section>

        <form method="POST" action="<?php echo base_url('admin/data_bahan_baku/tambah_bahan_baku_aksi')?>">

        	<div class="form-group">
        		<label>Nama Bahan</label>
        		<input type="text" name="nama_bahan" class="form-control">
        		<?php echo form_error('nama_bahan','<span class="text-small text-danger">','</span>')?>
        	</div>
        	
        	<div class="form-group">
        		<label>Stock</label>
        		<input type="text" name="stock" class="form-control">
        		<?php echo form_error('stock','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>Harga</label>
        		<input type="text" name="harga_satuan" class="form-control">
        		<?php echo form_error('harga_satuan','<span class="text-small text-danger">','</span>')?>
        	</div>

            <div class="form-group">
                <label>Satuan</label> 
                <select name="satuan" class="form-control">
                    <option value="">--Pilih Satuan--</option>
                    <option value="lembar">Lembar</option>
                    <option value="meter">Meter</option>
                </select>                   
                <?php echo form_error('satuan', '<div class="text-small text-danger">','</div>')?>
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

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control">
                <?php echo form_error('ket','<span class="text-small text-danger">','</span>')?>
            </div>

        	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
        	<button type="reset" class="btn btn-sm btn-danger">Reset</button>
        </form>
</div>