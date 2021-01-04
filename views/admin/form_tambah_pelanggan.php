<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Tambah Data Pelanggan</h1>
          </div>
        </section>

        <form method="POST" action="<?php echo base_url('admin/data_pelanggan/tambah_pelanggan_aksi')?>">

        	<div class="form-group">
        		<label>Nama</label>
        		<input type="text" name="nama_pelanggan" class="form-control">
        		<?php echo form_error('nama_pelanggan','<span class="text-small text-danger">','</span>')?>
        	</div>
        	
        	<div class="form-group">
        		<label>Username</label>
        		<input type="text" name="username" class="form-control">
        		<?php echo form_error('username','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>Password</label>
        		<input type="password" name="password" class="form-control">
        		<?php echo form_error('password','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>Alamat</label>
        		<input type="text" name="alamat" class="form-control">
        		<?php echo form_error('alamat','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>No. Telp</label>
        		<input type="text" name="no_telp" class="form-control">
        		<?php echo form_error('no_telp','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<div class="form-group">
        		<label>Email</label>
        		<input type="text" name="email" class="form-control">
        		<?php echo form_error('email','<span class="text-small text-danger">','</span>')?>
        	</div>

        	<button type="submit" class="btn btn-sm btn-primary">Submit</button>
        	<button type="reset" class="btn btn-sm btn-danger">Reset</button>
        </form>
</div>