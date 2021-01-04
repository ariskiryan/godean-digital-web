<div class="container">
	<div class="card" style="margin-top: 200px; margin-bottom: 50px;">
		<div class="card-header">
			Form Pemesanan			
		</div>
		<div class="card-body">
			<?php foreach($detail as $dt) :?>

				<form method="POST" action="<?php echo base_url('customer/pesan/tambah_pesanan_aksi')?>">



					<div class="form-group">
						<label>Jenis Bahan</label>
						<input type="text" name="jenis_pesanan" class="form-control" id="jenis" value="<?php echo $dt->jenis?>" readonly>
						
					</div>

					<div class="form-group">
						<label>Harga Lembar/Meter</label>
						<input type="hidden" name="id_produk" value="<?php echo $dt->id_produk?>">
						<input type="text" id="harga" name="harga" class="form-control" value="<?php echo $dt->harga?>" readonly>
					</div>

					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control">
					</div>

                    <div class="form-group">
                        <label>Jenis Layanan</label> 
                          <select name="jenis_layanan" class="form-control" id="jenis_layanan">
                            <option value="">--Pilih Layanan--</option>
                            <option value="Reguler">Reguler</option>
                            <option value="Kilat">Kilat</option>
                        </select>                   
                        <?php echo form_error('jenis_layanan', '<div class="text-small text-danger">','</div>')?>
                    </div>


					<div class="form-group">
						<label>Panjang</label>
						<input type="text" name="panjang" class="form-control">
					</div>

					<div class="form-group">
						<label>Lebar</label>
						<input type="text" name="lebar" class="form-control">
					</div>

					<div class="form-group">
						<label>Qty</label>
						<input type="text" name="qty" class="form-control">
					</div>

					<div class="form-group">
						<label>File</label>
						<input type="text" name="file" class="form-control">
					</div>

					<div class="form-group">
						<label>Jenis Finishing</label>
						<input type="text" name="jenis_finishing" class="form-control">
					</div>

					<div class="form-group">
						<label>Tanggal Pesan</label>
						<input type="date" name="tgl_pesan" class="form-control">
					</div>

					<button type="submit" class="btn btn-warning">Pesan</button>
					
				</form>

			<?php endforeach; ?>
		</div>
	</div>	
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#jenis_layanan").change(function(){
        if($(this).val() == "Kilat")
            {
               if($("#jenis").val() == "Kertas")
	            {
	               $("#harga").val('4500');
	            }
	            if($("#jenis").val() == "Banner")
	            {
	               $("#harga").val('25000');
	            }
            }
         if($(this).val() == "Reguler")
            {
               if($("#jenis").val() == "Kertas")
	            {
	               $("#harga").val('4500');
	            }
	            if($("#jenis").val() == "Banner")
	            {
	               $("#harga").val('18000');
	            }
            }
        });
});

/*  $(document).ready(function(){
    alert('sdfghjkl');
  });*/
</script>