<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pemesanan</h1>
          </div>

          <?php echo $this->session->flashdata('pesan')?>
          <div class="table-responsive">
          <table class="table table-bordered table-striped table-sm">
          	<tr>
          		<th>No</th>
          		<th>Pelanggan</th>
          		<th>Produk</th>
          		<th>Jenis</th>
                    <th>Panjang</th>
                    <th>Lebar</th>
                    <th>Qty</th>
                    <th>Jenis Layanan</th>
                    <th>Sub_Total</th>
          		<th>Tanggal Pesan</th>
          		<th>Tanggal Selesai</th>
                    <th>Status Pemesanan</th>
          		<th>Aksi</th>
          	</tr>

          	<?php $no = 1;
          	foreach($detail_pemesanan as $dp) : ?>

          	<tr>
          		<td><?php echo $no++ ?></td>
          		<td><?php echo $dp->nama_pelanggan ?></td>
          		<td><?php echo $dp->nama_produk ?></td>
          		<td><?php echo $dp->jenis ?></td>
          		<td><?php echo $dp->panjang ?></td>
          		<td><?php echo $dp->lebar?></td>
                    <td><?php echo $dp->qty?></td>
                    <td><?php echo $dp->jenis_layanan?></td>
                    <td>Rp.<?php echo number_format($dp->sub_total,0,',','.')?></td>
          		<td><?php echo date('d/m/Y', strtotime($dp->tgl_pesan)); ?></td>
                    <td>
                         <?php  
                              if ($dp->tgl_selesai == "0000-00-00") {
                                   echo "-";
                              }else{
                                   echo date('d/m/Y', strtotime($dp->tgl_selesai));
                              }
                         ?>           
                    </td>
                    <td>
                         <?php 
                              if ($dp->status_pemesanan == "1") {
                                    echo "ACC";
                               }else{
                                   echo "Tunggu Konfirmasi";
                               } 
                         ?>
                              
                    </td>

          		<td>
                         <?php
                              if ($dp->status_pemesanan == "1") {
                                   echo "-";
                              }else { ?>
                                   <div class="row">
                                        <a class="btn btn-sm btn-warning mr-2" href="<?php echo base_url('admin/data_pemesanan/acc_pesanan') ?>">
                                             <i class='fas fa-check'></i>
                                        </a>

                                        <a class="btn btn-sm btn-danger mr-2" href="<?php echo base_url('admin/data_pemesanan/batal_pesanan') ?>">
                                             <i class='fas fa-times'></i>
                                        </a>

                                         <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/data_pemesanan/detail_pemesanan') ?>">
                                             <i class='fas fa-eye'></i>
                                        </a>
                                   </div>
                              <?php } ?>
          		</td>
          	</tr>
          	<?php endforeach; ?>
          </table>
          </div>
     </section>
</div> 