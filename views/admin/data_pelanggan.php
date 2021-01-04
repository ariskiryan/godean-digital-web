<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pelanggan</h1>
          </div>

          <a href="<?php echo base_url('admin/data_pelanggan/tambah_pelanggan')?>" class="btn btn-primary mb-3">Tambah Pelanggan</a>
          <?php echo $this->session->flashdata('pesan')?>

          <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
          	<tr>
          		<th>No</th>
          		<th>Nama</th>
          		<th>Username</th>
          		<th>Password</th>
          		<th>Alamat</th>
          		<th>No. Telp</th>
          		<th>Email</th>
          		<th>Aksi</th>
          	</tr>

          	<?php
          	$no = 1;
          	foreach ($pelanggan as $pl) : ?>

          	<tr>
          		<td><?php echo $no++ ?></td>
          		<td><?php echo $pl->nama_pelanggan ?></td>
          		<td><?php echo $pl->username ?></td>
          		<td><?php echo $pl->password ?></td>
          		<td><?php echo $pl->alamat ?></td>
          		<td><?php echo $pl->no_telp ?></td>
          		<td><?php echo $pl->email ?></td>
          		<td>

                    <div class="row">

                         <a href="<?php echo base_url('admin/data_pelanggan/update_pelanggan/').$pl->id_pelanggan?>" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>  
                         
          			<a href="<?php echo base_url('admin/data_pelanggan/delete_pelanggan/').$pl->id_pelanggan?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

   
                    </div> 

          		</td>
          	</tr>

          	<?php endforeach; ?>
          </table>
          </div>
     </section>
</div>