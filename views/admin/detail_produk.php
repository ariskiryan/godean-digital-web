      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Produk</h1>
          </div> 
        </section>

        <?php foreach($detail as $dt) : ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <img width="350px" src="<?php echo base_url().'assets/upload/'.$dt->gambar?>">
                </div>
                <div class="col-md-7">
                  <table class="table">
                    <tr>
                      <td>Nama Produk</td>
                      <td><?php echo $dt->nama_produk?></td>
                    </tr>

                    <tr>
                      <td>Harga</td>
                      <td>Rp. <?php echo number_format($dt->harga,0,',','.')?></td>
                    </tr>

                    <tr>
                      <td>Status</td>
                      <td>
                      <?php 
                          if($dt->status=="0"){
                            echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                            }else{
                            echo "<span class='badge badge-primary'>Tersedia</span>";
                            }  
                      ?> 
                      </td>
                    </tr>

                  </table>

                  <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('admin/data_produk')?>">Kembali</a>
                  <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/data_produk/update_produk/'.$dt->id_produk)?>">Update</a>

                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
       </div>