<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Update Data Bahan</h1>
          </div>
        </section>

        <?php foreach ($bahan_baku as $bb) : ?>


        <form method="POST" action="<?php echo base_url('admin/data_bahan_baku/update_bahan_baku_aksi')?>">

        	<div class="form-group">
        		<label>Nama Bahan</label>
                <input type="hidden" name="id_bahan" value="<?php echo $bb->id_bahan?>">
        		<input type="text" name="nama_bahan" class="form-control" value="<?php echo $bb->nama_bahan?>">
        		<?php echo form_error('nama_bahan','<span class="text-small text-danger">','</span>')?>
        	</div>
        	
        	<div class="form-group">
        		<label>Stock</label>
        		<input type="text" name="stock" class="form-control" value="<?php echo $bb->stock?>">
        		<?php echo form_error('stock','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>Harga Satuan</label>
        		<input type="text" name="harga_satuan" class="form-control" value="<?php echo $bb->harga_satuan?>">
        		<?php echo form_error('harga','<span class="text-small text-danger">','</span>')?>
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
                          <option <?php if ($bb->status == "1"){echo "selected='selected'";}
                                   echo $bb->status; ?> value="1">Tersedia</option>
                          <option <?php if ($bb->status == "0"){echo "selected='selected'";}
                                   echo $bb->status; ?> value="0">Tidak Tersedia</option>
                    </select>                   
                    <?php echo form_error('status', '<div class="text-small text-danger">','</div>')?>
             </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" value="<?php echo $bb->ket?>">
                <?php echo form_error('ket','<span class="text-small text-danger">','</span>')?>
            </div>

        	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
        	<button type="reset" class="btn btn-sm btn-danger">Reset</button>
        </form>
        <?php endforeach; ?>
</div>