<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Produk</h1>
          </div>

          <a href="<?php echo base_url('admin/data_produk/tambah_produk')?>" class="btn btn-primary mb-3">Tambah Data</a>
          
          <?php echo $this->session->flashdata('pesan')?>
          
          <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
            <thead>
            <tr>
              <th>No</th>            
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Gambar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              <?php 
                $no=1;
                foreach($produk as $pd) : ?>
                <tr>
                  <td><?php echo $no++ ?></td>

                  <td><?php echo $pd->nama_produk ?></td>
                  <td>Rp. <?php echo number_format($pd->harga,0,',','.')?></td>
                  <td>
                    <img width="80px" src="<?php echo base_url().'assets/upload/'.$pd->gambar?>">
                  </td>
                  
                  <td>
                  <?php 
                  if($pd->status =="0"){
                    echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }else{
                    echo "<span class='badge badge-primary'>Tersedia</span>";
                    }
                    ?>
                  </td>
                  <div>
                  <td>
                    <a href="<?php echo base_url('admin/data_produk/detail_produk/').$pd->id_produk ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    <a href="<?php echo base_url('admin/data_produk/delete_produk/').$pd->id_produk ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="<?php echo base_url('admin/data_produk/update_produk/').$pd->id_produk ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                  </td>

                </tr>
              <?php endforeach; ?>
              
            </tbody>
          </table>
          </div>
         </section>
</div>