<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Bahan Baku</h1>
          </div>

          <a class="btn btn-primary mb-3" href="<?php echo base_url('admin/data_bahan_baku/tambah_bahan_baku')?>">Tambah Bahan</a>
          <?php echo $this->session->flashdata('pesan')?>

          <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
          	<thead>
          		<tr>
          			<th>No</th>
          			<th>Nama Bahan</th>
          			<th>Stock</th>
          			<th>Harga Satuan</th>
                         <th>Satuan</th>
          			<th>Status</th>
          			<th>Keterangan</th>
                         <th>Aksi</th>
          		</tr>
          	</thead>

          	<tbody>
          		<?php 
          		$no = 1;
          		foreach($bahan_baku as $bb) : ?>
          			<tr>
          				<td><?php echo $no++ ?></td>
          				<td><?php echo $bb->nama_bahan?></td>
          				<td><?php echo $bb->stock?></td>
                              <td>Rp. <?php echo number_format($bb->harga_satuan,0,',','.')?></td>
                              <td><?php echo $bb->satuan?></td>
          				<td>
          				<?php 
          				if($bb->status =="0"){
          					echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
          					}else{
          					echo "<span class='badge badge-primary'>Tersedia</span>";
          					}
          					?>
          				</td>
          				<td><?php echo $bb->ket?></td>
                              <td>

                    <div class="row">

                         <a href="<?php echo base_url('admin/data_bahan_baku/update_bahan_baku/').$bb->id_bahan?>" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>  
                         
                         <a href="<?php echo base_url('admin/data_bahan_baku/delete_bahan_baku/').$bb->id_bahan?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

   
                    </div> 

                    </td>
          			</tr>
          		<?php endforeach; ?>
          	</tbody>
          </table>
          </div>
        </section>
</div>